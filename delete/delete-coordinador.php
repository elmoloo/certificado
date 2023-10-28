<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('coordinador',array('id_coordinador'=>$_REQUEST['delId']));
	header('location:../add/add-coordinador.php?msg=rds');
	exit;
}
?>