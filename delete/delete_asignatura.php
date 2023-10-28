<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('asignatura',array('id_asignatura'=>$_REQUEST['delId']));
	header('location: browse-asignatura.php?msg=rds');
	exit;
}
?>