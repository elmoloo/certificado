<?php
    require_once("db.php");
    include_once('config.php');

    if (empty($_GET['user_id'])){
        header('Location: index.php');
    }

    if (empty($_GET['token'])){
        header('Location: index.php');
    }

    $user_id = $_GET["user_id"];
    $token = $_GET['token'];
    //echo "<br>*****".$token."****<br>";

    $tabla = 'usuarios';
    $where = " token="."'$token' ";

    $administrador = $db->consultaDatos($tabla, $where);

    if(!empty($administrador)){
?>
    <!DOCTYPE html>
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
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div >
                <img src="assets/images/itsms.png" alt="logo" class="logo" >
              </div>
              <p class="login-card-description">Cambio de Cotraseña </p>
              <form id="form1" name="form1" method="post" action="update-pass.php">
                  <div class="form-group">
                  <input name="clave" type="password" id="clave" class="form-control" placeholder="Ingrese nueva contraseña" require>
                  <input name="Repetirclave" type="password" id="clave" class="form-control" placeholder="Repetir Contraseña" require>
                  <input id="Idusuario" name="Idusuario" type="hidden" value="<?php echo $user_id?>">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Cambio contraseña">
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>
<footer>
<?php include_once('footer.php');	?>
</footer>
</html>

<?php
       
    }
    else{
        ?>

        <!DOCTYPE html>
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
        </html>
        <?php
         
        exit;
    }
?>
