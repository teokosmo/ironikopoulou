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
//echo htmlentities($output);
global $user;
$hostName = $_SERVER['SERVER_NAME'];
$urlParams = ',reviews,news,interviews,stage_design,press_main,installations,';
//anonymous user @ pictorial site && NOT for the above category-links  
//=>  title with no LINK to node
/*
DEPRECATED since 20210124
if($user->uid==0 
	&& strrpos($hostName, "pictorial.ironikopoulou.gr") !== false 
	&& strrpos(",".$urlParams.",",$_GET['q']) === false
	)
{
	print preg_replace('/\d{4}-\d{2}-\d{2}./', '', $row->node_title);
}
else
{
	print preg_replace('/\d{4}-\d{2}-\d{2}./', '', $output);
}
*/
print preg_replace('/\d{4}-\d{2}-\d{2}./', '', $output);
//print $output; 
?>