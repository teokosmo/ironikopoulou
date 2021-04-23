<?php
//ACCESS DRUPAL DATABASE FROM EXTERNAL FILE
	
require_once ('./includes/bootstrap.inc') ;
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//load NODE
$node = node_load($_GET['nodeId']);

//print_r($node);

$output='';
//*********TITLE**********
$output.='<h2 class="title">'.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->title).'</h2><br/>';


//*********IMAGE**********
$imageLink = '';
if(isset($node->field_literary_image)){
	foreach($node->field_literary_image as $currentImage)
	{	
		$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
		$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
		$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
		$encodedImageFileName=strtr($encodedImageFileName,$repl);		
	
		$src = $encodedImageFileName;
			$preset = 'img_big_thumbs';
			$alt = "";
			$title = t("");
			$attributes = NULL;
			$imgOutput = theme('imagecache', $preset, $src, $alt, $title,  $attributes); 
			$imgOutput = preg_replace('/www.ironikopoulou.gr/', 'literature.ironikopoulou.gr', $imgOutput);
		if($src!=''){
			$output.='<div id="imageField">'.$imgOutput.'</div>';
		}
	}
}

if(isset($node->field_page_image))
{
	foreach($node->field_page_image as $currentImage)
	{		
		$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
		$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
		$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
		$encodedImageFileName=strtr($encodedImageFileName,$repl);		
		$src = base_path().$encodedImageFileName;
		$preset = 'img_big_thumbs';
		$alt = "";
		$title = t("");
		$attributes = NULL;
		$imgOutput = theme('imagecache', $preset, $src, $alt, $title,  $attributes); 
 		$imgOutput = preg_replace('/www.ironikopoulou.gr/', 'literature.ironikopoulou.gr', $imgOutput);
 		if($src!=''){
			$output.='<div id="imageField">'.$imgOutput.'</div>';
		}
	}
}

//*********BODY**********
$bodyField = preg_replace('/src="\/sites\/default\/files/', 'src="http://literature.ironikopoulou.gr/sites/default/files', $node->body); 
$output.='<div id="bodyField">'.$bodyField.'</div>';

include("./sites/all/libraries/MPDF53/mpdf.php");

$mpdf=new mPDF();
$mpdf->SetHTMLFooter("<div style=\"width:100%;text-align:right;text-decoration:underline;\">www.ironikopoulou.gr</div>");
$mpdf->WriteHTML($output);
$mpdf->Output();
exit;
?>