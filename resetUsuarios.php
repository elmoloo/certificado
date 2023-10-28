<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Sistema de Certificados ISTMS</title>
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
              <p class="login-card-description">Recuperación de contraseñas </p>
              <form id="form1" name="form1" method="post" action="configurarCorreo.php">
                  <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
                  <div align="right">
                      <a href="ingreso.php">Volver a Login</a>
                    </div>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Enviar Correo">
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