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
$hostName = $_SERVER['SERVER_NAME'];
$filePath = $arr['path'];
$viewUrl = explode("q=",$arr['query']);	
$firstPart = substr( $output,0,strpos($output,'<img') );
$secondPart = substr( $output,strpos($output,'/>') );

$src = '';
$src = substr( $output,strpos($output,'images/')+7);
$src = substr( $src,0,strpos($src,'?'));

//echo htmlentities($src);
//echo htmlentities($firstPart);
//echo htmlentities($secondPart);
//echo htmlentities($output);


if($src!= '')
{	
	if( strrpos($hostName, "literature.ironikopoulou.gr") !== false){	
		$srcFileName ='sites/literature.ironikopoulou.gr/files/images/'.$src;
	}
	else{
		$srcFileName ='sites/default/files/images/'.$src;
	}
	
	
//	echo htmlentities($srcFileName);
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
}
?>


