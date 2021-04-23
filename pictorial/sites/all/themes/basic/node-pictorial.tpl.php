<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
//print_r($node);

$reviewFieldLink='<div id="reviewFieldLink" style="margin:5px"><a href="#reviewField">'.
								t('Δείτε τις ').$node->content['field_pictorial_reviews']['field']['#title'].
							 '</a></div>';
$output='<div id="topPage"></div>';
//*********ENGLISH TITLE**********
if($node->field_pictorial_eng_title[0]['value']!=''){
	$output.='<h1 class="title">'.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->field_pictorial_eng_title[0]['value']).'</h1>';
}
//*********TAXONOMY**********
foreach($node->taxonomy as $term)
{
	switch($term->tid){
		case 1:
		case 2:
		case 3:
			$inlineStyle='style="float:none;"';
			break;
		default:
			$inlineStyle ='';
			break;
	}
}

//*********IMAGE**********

$arr = parse_url($_SERVER['REQUEST_URI']);
$filePath = $arr['path'];
$imageLink = '';
foreach($node->field_pictorial_image as $currentImage)
{	
	if($currentImage['view'] != '')
	{
		$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
		$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
		$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
		$encodedImageFileName=strtr($encodedImageFileName,$repl);		
		
		/*
		$src = $filePath.$encodedImageFileName;	
		$thumbSrc = 'phpThumb/phpThumb.php?src='.$src.'&w=250&h=250';  //set maximum height AND width	
		$imageLink = '<img src="'.$thumbSrc.'" />';
		$lightBoxImageLink = '<a href="'.$src.'" rel="lightbox[]['.$node->title.']" >'.$imageLink.'</a>';
		*/
		
		$src = base_path().$encodedImageFileName;
		$preset = 'img_big_thumbs';
		$alt = "";
		$title = t("Κάντε κλικ για μεγέθυνση");
		$attributes = NULL;
		$imgOutput = theme('imagecache', $preset, $src, $alt, $title,  $attributes); 
 		$lightBoxImageLink = '<a href="'.$src.'" rel="lightbox[]['.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->title).']" >'.$imgOutput.'</a>';
 		
  	$output.='<div id="imageField">'.$lightBoxImageLink.'</div>';

	}
}

//CHECK IF NODE HAS REVIEWS AND IF IT DOES DISPLAY REVIEWS LINK
if($node->field_pictorial_reviews[0]['nid']!=''){
	$output.=$reviewFieldLink;
}

//*********BODY**********
$output.='<div id="bodyField">'.$node->content['body']['#value'].'</div>';

//********VIDEO***********
foreach($node->field_pictorial_video as $currentVideo)
{
	if($currentVideo['view'] != '')
	{
		$output.='<div id="videoField">'.$currentVideo['view'].'</div>';
	}
}

//*******SOUND************
foreach($node->field_pictorial_sound as $currentSound)
{
	if($currentSound['view'] != '')
	{
		$output.='<div id="soundField">'.$currentSound['view'].'</div>';
	}
}

//*******REVIEW************
$cnt=0;
$output.='<div id="reviewField">';
foreach($node->field_pictorial_reviews as $currentReview)
{
	if($currentReview['view'] != '')
	{
		if($cnt==0)
			$output.='<b>'.$node->content['field_pictorial_reviews']['field']['#title'].'</b> : <br/>';
			
		$output.=($cnt+1).'. '.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $currentReview['view']).'<br/>';
	}
	$cnt++;
}
$output.='</div>';


//*********UPDATED TIME**********
$output.='<div id="lastUpdateField">';
$output.="<b>Τελευταία Ανανέωση:</b><br/>";
$output.=format_date($node->changed);
$output.='</div>';

//*******LINK TO TOP
$output.='<div id="linkToTop"><a href="#topPage">'.
			'<img title="'.t('Αρχή').'" alt="" height="24" width="24" src="'.base_path(). path_to_theme().'/css/images/arrow-top.jpeg">'.
		 '</a></div>';

echo $output;
?>
