<?php
// $Id: zoomify.inc,v 1.2.2.3.4.7 2009/07/06 08:05:39 kratib Exp $
/**
 * @file Utility and API functions for zoomify.module
 */

function _zoomify_images($node) {
  $images = array();
  foreach (module_implements('zoomify_images') as $module) {
    $these_images = module_invoke($module, 'zoomify_images', $node);
    if (!empty($these_images)) foreach ($these_images as $fid => $filepath) {
      if ($fid && $filepath) {
        $images[$fid] = $filepath;
      }
    }
  }
  return $images;
}

function _zoomify_basepath() {
  $basepath = file_directory_path() .'/zoomify';
  if (!file_check_directory($basepath, FILE_CREATE_DIRECTORY)) {
    $msg = 'Could not create path %path.';
    $arg = array('%path' => $basepath);
    drupal_set_message(t($msg, $arg), 'error');
    watchdog('zoomify', $msg, $arg, WATCHDOG_ERROR);
  }
  return $basepath;
}

function _zoomify_nodepath($node) {
  return file_create_path(_zoomify_basepath() .'/'. $node->nid);
}

function _zoomify_filepath($node, $fid) {
  return file_create_path(_zoomify_nodepath($node) .'/'. $fid);
}

function _zoomify_identical($node, $fid, $filepath) {
  $md5 = md5_file($filepath);
  $md5_path = _zoomify_filepath($node, $fid) .'/Image.md5';
  if (!file_exists($md5_path)) return FALSE;
  $md5_existing = file_get_contents($md5_path);
  return $md5_existing == $md5;
}

function _zoomify_insert_node($node) {
  $images = _zoomify_images($node);
  if (!empty($images)) foreach ($images as $fid => $filepath) {
    _zoomify_process($node, $fid, $filepath);
  }
}

function _zoomify_process($node, $fid, $filepath) {
  // TODO: Let user adjust maximum time for scripts or provide better mechanism.
  set_time_limit(0);

  $info = image_get_info($filepath);
  if ($info === FALSE) {
    $msg = 'Could not find image info for file %path.';
    $arg = array('%path' => $filepath);
    watchdog('zoomify', $msg, $arg, WATCHDOG_ERROR);
    drupal_set_message(t($msg, $arg), 'error');
    return;
  }
  if (($info['width'] < variable_get('zoomify_minimum_width', 1024))
   && ($info['height'] < variable_get('zoomify_minimum_height', 768))) return;

  if (!file_check_directory(_zoomify_nodepath($node), FILE_CREATE_DIRECTORY)) {
    $msg = 'Could not create path %path.';
    $arg = array('%path' => _zoomify_nodepath($node));
    drupal_set_message(t($msg, $arg), 'error');
    watchdog('zoomify', $msg, $arg, WATCHDOG_ERROR);
    return;
  }
  
  $backend = variable_get('zoomify_backend', ZOOMIFY_BACKEND_PHP);
  if ($backend == ZOOMIFY_BACKEND_MANUAL && !isset($node->zoomify[$fid]) && isset($node->zoomify['new'])) { // the new file is taken for the first unknown fid
    $node->zoomify[$fid] = $node->zoomify['new'];
    unset($node->zoomify['new']);
  }

  if ($backend == ZOOMIFY_BACKEND_PHP) {
    require_once(drupal_get_path('module', 'zoomify') .'/ZoomifyFileProcessor.php');
    $zoomify = new ZoomifyFileProcessor();
    $zoomify->ZoomifyProcess($filepath);
    rename($zoomify->_v_saveToLocation, _zoomify_filepath($node, $fid));
  }
  else if ($backend == ZOOMIFY_BACKEND_PYTHON) {
    $pathinfo = pathinfo_filename($filepath);
    $cmd = 'cd '. $pathinfo['dirname']  .' && python '. variable_get('zoomify_backend_python', getcwd() .'/'. drupal_get_path('module', 'zoomify') .'/ZoomifyImage') .'/ZoomifyFileProcessor.py'.
           ' "'. $pathinfo['basename'] .'"'.
           ' 2>&1';
    $return = 0;
    $output = array();
    exec($cmd, $output, $return);
    if ($return) {
      $msg = 'ZoomifyFileProcessor.py returned an error:<br />!output';
      $arg = array('!output' => implode('<br />', $output));
      watchdog('zoomify', $msg, $arg, WATCHDOG_ERROR);
      drupal_set_message(t($msg, $arg), 'error');
      return;
    }
    rename($pathinfo['dirname'] .'/'. $pathinfo['filename'], _zoomify_filepath($node, $fid));
  }
  else if ($backend == ZOOMIFY_BACKEND_MANUAL && isset($node->zoomify[$fid]) ) {
    $zip = new ZipArchive;
    $res = $zip->open($node->zoomify[$fid]);
    if ($res !== TRUE) {
      $msg = 'Could not open Zip archive, error code: !output';
      $arg = array('!output' => $res);
      watchdog('zoomify', $msg, $arg, WATCHDOG_ERROR);
      drupal_set_message(t($msg, $arg), 'error');
      return;
    }
    $root = $zip->locateName('ImageProperties.xml', ZIPARCHIVE::FL_NOCASE|ZIPARCHIVE::FL_NODIR);
    if ($root === FALSE) {
      $msg = 'Could not locate ImageProperties.xml in Zip archive.';
      watchdog('zoomify', $msg, array(), WATCHDOG_ERROR);
      drupal_set_message(t($msg, array()), 'error');
      return;
    }
    $path = dirname($zip->getNameIndex($root));
    if ($path == '.') {
      $zip->extractTo(_zoomify_filepath($node, $fid));
    }
    else {
      $tmp = _zoomify_nodepath($node);
      $zip->extractTo($tmp);
      rename($tmp .'/'. $path, _zoomify_filepath($node, $fid));
      $path = dirname($path);
      if ($path != '.') {
        rrmdir($tmp .'/'. $path);
      }
    }
    $zip->close();
  }
  else {
    drupal_set_message(t('No tiles have been created.'));
    return;
  }

  $md5 = md5_file($filepath);
  $md5_path = _zoomify_filepath($node, $fid) .'/Image.md5';
  file_put_contents($md5_path, $md5);

  $msg = 'Created tiles for image %path.';
  $arg = array('%path' => $filepath);
  drupal_set_message(t($msg, $arg), 'status');
  watchdog('zoomify', $msg, $arg, WATCHDOG_NOTICE);
}

function _zoomify_delete_node($node) {
  if (is_dir(_zoomify_nodepath($node))) {
    rrmdir(_zoomify_nodepath($node));
    $msg = 'Tiles deleted for node %nid.';
    $arg = array('%nid' => $node->nid);
    watchdog('zoomify', $msg, $arg, WATCHDOG_NOTICE);
    drupal_set_message(t($msg, $arg), 'status');
  }
}

function _zoomify_update_node($node) {
  $old_images = file_scan_directory(_zoomify_nodepath($node), '.*', array('.', '..'), 0, FALSE);
  $images = _zoomify_images($node);
  if (!empty($images)) foreach ($images as $fid => $filepath) {
    if (!_zoomify_identical($node, $fid, $filepath) ||
        (variable_get('zoomify_backend', ZOOMIFY_BACKEND_PHP) == ZOOMIFY_BACKEND_MANUAL && isset($node->zoomify[$fid]))
       ) {
      rrmdir(_zoomify_filepath($node, $fid));
      _zoomify_process($node, $fid, $filepath);
    }
  }
  if (!empty($old_images)) foreach ($old_images as $old_image) {
    if (!array_key_exists($old_image->basename, $images) && is_dir($old_image->filename)) {
      rrmdir($old_image->filename);
      $msg = 'Tiles deleted for obsolete file %fid.';
      $arg = array('%fid' => $old_image->basename);
      watchdog('zoomify', $msg, $arg, WATCHDOG_NOTICE);
      drupal_set_message(t($msg, $arg), 'status');
    }
  }
}

