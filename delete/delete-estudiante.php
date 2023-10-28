<?php 
require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('estudiante',array('id_estudiante'=>$_REQUEST['delId']));
	header('location: ../estudiante.php?msg=rds');
	exit;
}
?>