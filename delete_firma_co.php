<?php
require_once('../include/usuario.php');
session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location: ingreso.php');
}
require_once("../include/db.php");



$sql = "SELECT * FROM coordinador WHERE id_coordinador=".$_REQUEST["id_coordinador"];
echo "<br>".$sql;

$stmt = $pdo_conn->query($sql);
$nombre = $stmt->fetchColumn(4);

if ($nombre !== false) {
    
    $_ruta='C:\\xampp\\htdocs\\mariano_certificado\\firmas\\firma_coordinador\\'.$nombre;
    echo "<br>***".$_ruta;
    If (unlink($_ruta)) {
        $_ruta='firmas/'.$nombre;
        unlink($_ruta);
        $sql = "DELETE FROM coordinador WHERE fichero.id_coordinador=".$_REQUEST["id_coordinador"];
        echo "***********<br>".$sql."<br>**********";
        if ($pdo_conn->query($sql) == TRUE) {
            $flag	=	1;
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    } else {
        echo "Error no se ha podido borrar el fichero";
        ECHO "Nombre de fichero:".$nombre;
        return;
    }
}

if($flag	=	1){
	header('location:..add_coordinador.php?msg=ras');
	exit;
}
?>