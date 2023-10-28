<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('facilitador',array('id_facilitador'=>$_REQUEST['delId']));
	header('location:../add/add-facilitador.php?msg=rds');
	exit;
}
?>