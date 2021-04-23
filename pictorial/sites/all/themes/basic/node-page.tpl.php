<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $

global $user;
if($user->uid==1){
	//print_r($node);
}

$output='<div id="topPage"></div>';

//*********ENGLISH TITLE**********
if($node->field_page_eng_title[0]['value']!=''){
	echo '<h1 class="title">'.preg_replace('/\d{4}-\d{2}-\d{2}./', '', $node->field_page_eng_title[0]['value']).'</h1><br/>';
}

foreach($node->taxonomy as $term)
{
	switch($term->tid){
		case 11:  //PICTORIAL NEW
		case 12:	//PICTORIAL REVIEW
		case 15:	//LITERATURE REVIEW
		case 16:	//LITERATURE NEW
			//SERVICE LINKS & EMAIL LINK & PDF LINK
			$output.=$node->service_links_rendered.'<div><a class="'.$node->links['print_mail']['attributes']['class'].'" '.
															'href="'.base_path().$node->links['print_mail']['href'].'" >'.
														'<img title="'.t('Αποστολή σε φίλο').'" src="'.base_path().'sites/all/modules/print/icons/mail_icon.png" /></a>'.
														'&nbsp;&nbsp;<a target="_blank" href="'.base_path().'downloadpdf.php?nodeId='.$node->nid.'" class="'.$node->links['print_pdf']['attributes']['class'].'" '.
																'onClick="javascript: _gaq.push([\'_trackPageview\', \'/node/'.$node->nid.'/pdf\']);">'.
														'<img src="'.base_path().'sites/all/modules/print/icons/pdf_icon.png" title="'.$node->links['print_pdf']['attributes']['title'].'" /></a>'.
												   '</div><br/>';
			break;
		default:		
			break;
	}
}


//*********IMAGE**********

$arr = parse_url($_SERVER['REQUEST_URI']);
$filePath = $arr['path'];
$imageLink = '';
if(isset($node->field_page_image))
{
	foreach($node->field_page_image as $currentImage)
	{		
		if($currentImage['view'] != '')
		{
			$srcFileName = str_replace( "&amp;","&",$currentImage['filepath'] ); 
			$encodedImageFileName=urlencode($srcFileName);   //encodes characters like '&'
			$repl=array("+" => "%20" ,"%28" => "(" ,  "%29" => ")" , "%2F" => "/" );
			$encodedImageFileName=strtr($encodedImageFileName,$repl);		
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
}

//*********BODY**********
$output.='<div id="bodyField">'.$node->content['body']['#value'].'</div>';


//********VIDEO***********
if(isset($node->field_page_video))
{
	foreach($node->field_page_video as $currentVideo)
	{
		if($currentVideo['view'] != '')
		{
			$output.='<div id="videoField">'.$currentVideo['view'].'</div>';
		}
	}
}

if(isset($node->field_page_sound))
{
	//*******SOUND************
	foreach($node->field_page_sound as $currentSound)
	{
		if($currentSound['view'] != '')
		{
			$output.='<div id="soundField">'.$currentSound['view'].'</div>';
		}
	}
}

if(!drupal_is_front_page())
{
	//*********UPDATED TIME**********
	$output.='<div id="lastUpdateField">';
	$output.="<b>".t('Τελευταία Ανανέωση').":</b><br/>";
	$output.=format_date($node->changed);
	$output.='</div>';
	
	//*******LINK TO TOP
	$output.='<div id="linkToTop"><a href="#topPage">'.
			'<img title="'.t('Αρχή').'" alt="" height="24" width="24" src="'.base_path() . path_to_theme().'/css/images/arrow-top.jpeg">'.
		 '</a></div>';

}



echo $output;

?>
