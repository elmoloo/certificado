<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <title>Sistema de Certificados ITSMS</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                <img src="assets/images/itsms.png"  >
                </div>
               
              <p class="login-card-description"><b><center>Ingreso  al sistema de certificados <center> ISTMS</b></p>
                <form id="form1" name="form1" method="post" action="controller_login.php">
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control _ge_de_ol" type="text" placeholder="Ingrese el usuario" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" name="clave" class="form-control _ge_de_ol" type="text" placeholder="Ingrese su clave" required="" aria-required="true">
                </div>
                <input  name="entrar" type="hidden" id="entrar" value="entrar" >
                <input name="tipo" type="hidden" id="tipo" value="ADMIN" />
                
                <div align="right">
                      <a href="resetUsuarios.php">Recuperar contraseña</a>
              
                  <input name="login" id="login" class="btn btn-block btn-dark login-btn" type="submit" value="Ingresar">
             
                </form>
                <div class="form-group nm_lk"><p>Or Login With</p></div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><a href="https://www.facebook.com/itsms2049?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li><i class="fa fa-google-plus"></i></li>
                      <li><a href="https://instagram.com/itsms_2049?igshid=MzRlODBiNWFlZA=="><i class="fa fa-instagram"></i></a></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  </body>
  <footer>
<?php include_once('footer.php');	?>
</footer>
</html>