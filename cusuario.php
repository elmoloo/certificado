<?php 
require_once('include/usuario.php');
session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location: ingreso.php');
}
		
/*if ($_SESSION['usuario']->getTipo()<>'ADMIN') {					
    echo "<br>No tienes permiso para acceder";
    echo "<br>Contacta con el administrador";
    header('Location: controller_login.php?accion=CERRARSESION');
    return;
}*/


        require_once("include/db.php");
        include_once('include/config.php');
?>