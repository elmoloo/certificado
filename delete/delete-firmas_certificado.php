<?php 
include_once('../config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('firmas_certificado',array('id_firmas_certificado'=>$_REQUEST['delId']));
	header('location:../curso.php?msg=rds');
	exit;
}
?>