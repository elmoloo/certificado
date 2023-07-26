<?php 
include_once('../config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('provincia',array('id_provincia'=>$_REQUEST['delId']));
	header('location:../add/add-provincia.php?msg=rds');
	exit;
}
?>