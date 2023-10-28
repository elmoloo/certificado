<?php
    require_once("db.php");
    include_once('config.php');
    
    if (isset($_POST['clave'])&&isset($_POST['Repetirclave'])){
        
        if($_POST['clave'] == $_POST['Repetirclave']) {
            $id_usuario = $_POST['Idusuario'];
            $pass=password_hash($_POST['clave'] ,PASSWORD_DEFAULT);
            $tabla = 'usuarios';
            $set = "clave="."'$pass'".",token="."''".",status=".'0';
            $where = "id="."'$id_usuario'";

            $update = $db->update_contraseña($tabla, $set, $where);
            echo "<script>
	alert('El cambio de contraseña se realizó con éxito ')
	window.location.href='index.php';
	</script>";
        }
        else
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Sistema de matriculación ISTMS</title>
          <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="assets/css/login.css">
        </head>
        <body>
        
        
            <div class="container">
                <div class="card">
                    <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Correo de restauración de contraseña enviado...</strong> </div>
                    <br>
                    <div class="col-sm-12">
                        <p>No se pueden verificar los datos</p>
                        <a href="index.php">Login</a>
                    </div>
                        
        
                </div>
            </div>
        
            <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        </body>
        <footer>
        <?php include_once("footer.php");	?>
        </footer>
        </html>';

       
    }