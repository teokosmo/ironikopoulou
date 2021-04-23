<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
?>
<?php 
$arr = parse_url($_SERVER['REQUEST_URI']);
$filePath = $arr['path'];
$viewUrl = explode("q=",$arr['query']);

$src = '';
$src = substr( $output,strpos($output,'images/')+7);
$src = substr( $src,0,strpos($src,'?'));

//echo htmlentities($src);
//echo htmlentities($output);


if($src!= '')
{	
	$srcFileName ='sites/default/files/images/'.$src;		
	
	$srcFileName = str_replace( "&amp;","&",$srcFileName ); 
	$encodedSrcFileName=urlencode($srcFileName);
	$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
	$encodedSrcFileName=strtr($encodedSrcFileName,$repl);	

/*
	$newSrc = $filePath.$encodedSrcFileName;
	$thumbSrc = 'phpThumb/phpThumb.php?src='.$newSrc.'&w=200&h=200';  //set maximum height AND width
	$imgOutput = '<img title="'.$title.'" src="'.$thumbSrc.'">';
*/
		
$newSrc = $encodedSrcFileName;
$preset = 'img_thumbs';
$alt = "";
$title = t("Κάντε κλικ για μεγέθυνση");
$attributes = NULL;
$imgOutput = theme('imagecache', $preset, $newSrc, $alt, $title,  $attributes);

//lightBox
	print '<a href="'.$newSrc.'" rel="lightbox[gall-'.$viewUrl[1].']['.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $row->node_title).']" >'.
				$imgOutput.		
		  '</a>';

//print More Link 
$urlParams = ',stage_design,press_main,installations,';
if(strrpos(",".$urlParams.",",$_GET['q']) !== false){
	print '&nbsp;&nbsp;<span class="moreLink"><a href="'.base_path().'node/'.$row->nid.'">'.t(' περισσότερα ...').'</a></span>';
}


/*
//lightBox iframe with imageZoomify implementation !!!!!!!!!!!!
		
		//get image dimensions regarding zoomify options
	  $imageInfo=image_get_info($srcFileName);
	  $image_width = $imageInfo['width'];
	  $image_height = $imageInfo['height'];
	  $max_width = variable_get('zoomify_width', 800);
	  $max_height = variable_get('zoomify_height', 600);
	 if (variable_get('zoomify_fixframe', TRUE)) {
	    $width = $max_width;
	    $height = $max_height;
	  }
	  else if ($image_width > $image_height) { // keep aspect ratio
	    $width = $max_width;
	    $height = ceil($max_width * $image_height / $image_width);
	  }
	  else {
	    $height = $max_height + ZOOMIFY_TOOLBAR_HEIGHT;
	    $width = ceil($max_height * $image_width / $image_height);
	  }
	  //adjust dimensions
	  //for FF 20 is fine for both dimensions
	  $height +=35;
	  $width +=24;
	  print '<a href="imageZoomify.php?nodeId='.$row->nid.'" rel="lightframe[gall-'.$viewUrl[1].'|width:'.$width.'px; height:'.$height.'px; scrolling: auto;]['.$row->node_title.']" ><img src="'.$thumbSrc.'"></a>';
	*/
	
	
	
}
?>


