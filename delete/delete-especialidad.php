<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('especialidad',array('id_especialidad'=>$_REQUEST['delId']));
	header('location: ../add/add-especialidad.php?msg=rds');
	exit;
}
?>