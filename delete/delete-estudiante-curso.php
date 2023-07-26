<?php 
include_once('../config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('estudiante_curso',array('id_estudiante_curso'=>$_REQUEST['delId']));
	header('location:../estudiante.php?msg=rds');
	exit;
}
?>