<?php
//ACCESS DRUPAL DATABASE FROM EXTERNAL FILE
if( $_SERVER['SERVER_NAME'] == 'localhost')
	chdir('../ironikop');
else	
	chdir('./pictorial');
	
require_once ('./includes/bootstrap.inc') ;
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
//load NODE
$node = node_load($_GET['nodeId']);

//print_r($node);
$output='<div id="topPage"></div>';
//*********TITLE**********
$output.='<h2 class="title">'.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->title).'</h2><br/>';

//*********IMAGE**********
$imageLink = '';
foreach($node->field_page_image as $currentImage)
{	
	$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
	$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
	$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
	$encodedImageFileName=strtr($encodedImageFileName,$repl);		

	$src = $encodedImageFileName;
		$preset = 'img_big_thumbs';
		$alt = "";
		$title = t("Κάντε κλικ για μεγέθυνση");
		$attributes = NULL;
		$imgOutput = theme('imagecache', $preset, $src, $alt, $title,  $attributes); 

	if( $_SERVER['SERVER_NAME'] == 'localhost' ){
		$imgOutput = preg_replace('/ironikopRoot/', 'ironikop', $imgOutput);
		$src = preg_replace('/ironikopRoot/', 'ironikop', base_path().$src);
	}
	else{
		$imgOutput = preg_replace('/www.ironikopoulou.gr/', 'pictorial.ironikopoulou.gr', $imgOutput);
	}	
	if($src!=''){
		$imgOutput = '<a onclick="return showFullSizeImage(\''.$src.'\');" href="javascript:void(0);">'.$imgOutput.'</a>';
		$output.='<div id="imageField">'.$imgOutput.'</div>';
	}
}



//*********BODY**********
$bodyField = preg_replace('/src="\/sites\/default\/files/', 'src="http://pictorial.ironikopoulou.gr/sites/default/files', $node->body); 
$output.='<div id="bodyField">'.$bodyField.'</div>';
//*******LINK TO TOP
$output.='<div id="linkToTop"><a href="#topPage">'.
			'<img title="'.t('Αρχή').'" alt="" height="20" width="20" src="./css/images/arrow-top.jpeg">'.
		 '</a></div>';
echo $output;
?>