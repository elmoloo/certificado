<?php 


require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('periodo_academico',array('id_periodoac'=>$_REQUEST['delId']));
	header('location: ../add/add-periodo-academico.php?msg=rds');
	exit;
}
?>