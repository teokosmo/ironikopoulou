<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
//print_r($node);



//*********TITLE**********
//echo '<h1 class="title">'.substr($node->title,10).'</h1><br/>';

$reviewFieldLink='<div id="reviewFieldLink" style="margin:5px"><a href="#reviewField">'.
								t('Δείτε τις ').$node->content['field_literary_reviews']['field']['#title'].
							 '</a></div>';
$output='<div id="topPage"></div>';
//SERVICE LINKS & EMAIL LINK & PDF LINK
$output.=$node->service_links_rendered.'<div><a class="'.$node->links['print_mail']['attributes']['class'].'" '.
												'href="'.base_path().$node->links['print_mail']['href'].'" >'.
											'<img title="'.t('Αποστολή σε φίλο').'" src="'.base_path().'sites/all/modules/print/icons/mail_icon.png" /></a>'.
											'&nbsp;&nbsp;<a target="_blank" href="'.base_path().'downloadpdf.php?nodeId='.$node->nid.'" class="'.$node->links['print_pdf']['attributes']['class'].'" '.
													'onClick="javascript: _gaq.push([\'_trackPageview\', \'/node/'.$node->nid.'/pdf\']);">'.
											'<img src="'.base_path().'sites/all/modules/print/icons/pdf_icon.png" title="'.$node->links['print_pdf']['attributes']['title'].'" /></a>'.
									   '</div><br/>';
//*********TAXONOMY**********
foreach($node->taxonomy as $term)
{
	switch($term->tid){
		case 1:  //Poetry-Books
		case 2:
		case 3:
			$inlineStyle='style="float:none;"';
	//different review link for poetry section		
			$poetryReviewFieldLink='<span id="reviewFieldLink" style="margin:5px"><a href="#reviewField">'.
								t('Δείτε τις ').$node->content['field_literary_reviews']['field']['#title'].
							 '</a></span>';
			break;
		default:
			$inlineStyle='';
			$poetryReviewFieldLink='';
			break;
	}
}

//*********IMAGE**********

$arr = parse_url($_SERVER['REQUEST_URI']);
$filePath = $arr['path'];
$imageLink = '';
foreach($node->field_literary_image as $currentImage)
{
	
	if($currentImage['view'] != '')
	{
		$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
		$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
		$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
		$encodedImageFileName=strtr($encodedImageFileName,$repl);		
		$src = base_path().$encodedImageFileName;
		$imageCacheSrc = substr($src,1);
		$preset = 'img_big_thumbs';
		$alt = "";
		$title = t("Κάντε κλικ για μεγέθυνση");
		$attributes = NULL;
		$imgOutput = theme('imagecache', $preset, $imageCacheSrc, $alt, $title,  $attributes); 
 		$lightBoxImageLink = '<a href="'.$src.'" rel="lightbox[]['.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->title).']" >'.$imgOutput.'</a>';
 		
	 	$output.='<div id="imageField" '.$inlineStyle.'>'.$lightBoxImageLink;
	 	$output.=($node->field_literary_reviews[0]['nid']!='')?$poetryReviewFieldLink:'';
	 	$output.='</div>';
		
	}
}
//CHECK IF NODE HAS REVIEWS AND IF IT DOES DISPLAY REVIEWS LINK
if($node->field_literary_reviews[0]['nid']!=''){
	$output.=($poetryReviewFieldLink=='')?$reviewFieldLink:'';
}

//*********BODY**********
$output.='<div id="bodyField">'.$node->content['body']['#value'].'</div>';


//********VIDEO***********
foreach($node->field_literary_video as $currentVideo)
{
	if($currentVideo['view'] != '')
	{
		$output.='<div id="videoField">'.$currentVideo['view'].'</div>';
	}
}

//*******SOUND************
foreach($node->field_literary_sound as $currentSound)
{
	if($currentSound['view'] != '')
	{
		$output.='<div id="soundField">'.$currentSound['view'].'</div>';
	}
}


//*******REVIEW************
$cnt= 0;
$output.='<div id="reviewField">';
foreach($node->field_literary_reviews as $currentReview)
{
	if($currentReview['view'] != '')
	{
		if($cnt==0)
			$output.='<b>'.$node->content['field_literary_reviews']['field']['#title'].'</b> : <br/>';
			
		$output.=($cnt+1).'. '.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $currentReview['view']).'<br/>';
	}
	$cnt++;
}
$output.='</div>';


//*********UPDATED TIME**********
$output.='<div id="lastUpdateField">';
$output.="<b>".t('Τελευταία Ανανέωση').":</b><br/>";
$output.=format_date($node->changed);
$output.='</div>';

$theme_default = variable_get('theme_default', '');
$path_to_theme = drupal_get_path('theme', $theme_default);
//$path_to_theme = path_to_theme();
//*******LINK TO TOP
$output.='<div id="linkToTop"><a href="#topPage">'.
			'<img title="'.t('Αρχή').'" alt="" height="20" width="20" src="'.base_path() . $path_to_theme.'/css/images/arrow-top.jpeg">'.
		 '</a></div>';

echo $output;

?>
