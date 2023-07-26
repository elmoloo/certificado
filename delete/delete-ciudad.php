<?php 
include_once('../config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('ciudad',array('id_ciudad'=>$_REQUEST['delId']));
	header('location:../add/add-ciudad.php?msg=rds');
	exit;
}
?>