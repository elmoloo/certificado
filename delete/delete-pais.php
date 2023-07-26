<?php 
include_once('../config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('pais',array('id_pais'=>$_REQUEST['delId']));
	header('location:../add/add-pais.php?msg=rds');
	exit;
}
?>