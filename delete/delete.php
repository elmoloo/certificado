<?php 
require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('cursos',array('id'=>$_REQUEST['delId']));
	header('location: ../index.php?msg=rds');
	exit;
}
?>