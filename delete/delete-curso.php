<?php 
require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('curso',array('id_curso'=>$_REQUEST['delId']));
	header('location: ../curso.php?msg=rds');
	exit;
}
?>