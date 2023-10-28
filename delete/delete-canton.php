<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('canton',array('id_canton'=>$_REQUEST['delId']));
	header('location:../add/add-canton.php?msg=rds');
	exit;
}
?>