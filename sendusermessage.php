<?php
//ACCESS DRUPAL DATABASE FROM EXTERNAL FILE
if( $_SERVER['SERVER_NAME'] == 'localhost')
	chdir('../ironikop');
else	
	chdir('./pictorial');
	
require_once ('./includes/bootstrap.inc') ;
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
global $language;
$emailTo = db_result(db_query("SELECT mail FROM {users} WHERE uid = %d", 3));	//3 ; irw
$from = $_POST['email'];

/* $_POST
Array
(
    [email] => 
    [fullname] => 
    [subject] => 
    [message] => 
)
 */ 
$contact = array('cid'=>1,
				'recipients'=>$emailTo,
				'reply'=>'');
$params =  array('name'=>$_POST['fullname'],
				'mail'=>$from,
				'subject'=>$_POST['subject'],
				'cid'=>1,
				'message'=>$_POST['message'],
				'copy'=>false,
				'op'=>'',
				'submit'=>'');
drupal_mail('contact', 'page_mail', $emailTo, $language, $params, $from ); 


?>
