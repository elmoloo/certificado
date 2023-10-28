<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('rector',array('id_rector'=>$_REQUEST['delId']));
	header('location:../add/add-rector.php?msg=rds');
	exit;
}
?>