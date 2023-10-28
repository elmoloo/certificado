<?php 

require_once('../cusuario.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('estudiante_curso',array('id_estudiante_curso'=>$_REQUEST['delId']));
	header("location:/mariano_certificado/estudiante_curso.php?msg=rds&delId=".$_REQUEST['delId']."&id_curso=".$_REQUEST['id_curso']."&id_coordinador=".$_REQUEST['id_coordinador']."&id_facilitador=".$_REQUEST['id_facilitador']."&id_rector=".$_REQUEST['id_rector']);
	exit;
}
?>