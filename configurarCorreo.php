<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require  'PHPMailer/Exception.php';
require  'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require_once("db.php");
include_once('config.php');

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through

    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'webmaster@marianosamaniego.edu.ec';                     //SMTP username
    $mail->Password   = 'webmaster2022';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



    //Make sure all POSTS are declared
    if (!isset($_POST['email'])) $error[] = "Por favor, rellene todos los campos";


    //email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address';
    } else {
        $tabla = 'usuarios';
        $correo = $_POST['email'];
        $where = "correo="."'$correo'";
        $administrador = $db->consultaDatos($tabla, $where);
    
        $cadena = strval( substr(md5(time()), 0, 30));

        $correo = $administrador['correo'];
        $where = "correo="."'$correo'";
        //$token = password_hash($cadena, PASSWORD_DEFAULT);
        $set = "token="."'$cadena'".",status=".'1';

        $update = $db->update_docente_reset($tabla, $set, $where);
        

        $url = 'http://'. $_SERVER["SERVER_NAME"].'/smistms/cambiar-pass.php?user_id='.$administrador["id"].'&token='.$cadena.'';
        
       
        //Recipients
        $mail->setFrom('webmaster@marianosamaniego.edu.ec', utf8_decode('Instituto Superior Tecnológico Mariano Samaniego'));
        $mail->addAddress($correo);     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = utf8_decode('Reseteo de Contraseña');
        $mail->Body    = '<h1 align="center">Instituto Superior Tecnológico Mariano Samaniego</h1>
        <h2 align="center">El Instituto Católico de la Frontera Sur</h2>
        <p align="left">Hola, '.$administrador['nombre'].' Se ha solicitado un restablecimiento para su Sistema académico 
        institucional, Para restablecer tu contraseña, visita la siguiente dirección: <a href="'.$url.'">'.$url.'</a></p>
        <p>Si tu no realizaste la solicitud de cambio de contraseña, solo ignora este mensaje </p>
        <p><strong>Nota: </strong>revisa spam sino te aparece en la bandeja de entrada</p>
        <p>Saludos Cordiales</p>
        <p>Departamento de Desarrollo de Software</p>';
       

        $mail->send();
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
                        <p>Te hemos enviado las instrucciones para resetear tu contraseña a la dirección de correo electrónico, o al correo electrónico a '.$correo.' . Si lo recibes pronto, asegúrate de comprobar la carpeta de spam. </p>
                        <a href="ingreso.php">Login</a>
                    </div>
                        
        
                </div>
            </div>
        
            <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        </body>
        <footer>
        <?php include_once("footer.php");	?>
        </footer>
        </html>';


        if (empty($docente['correo'])) {
            $error[] = 'No se reconoce el correo electrónico proporcionado.';
        }
    }
} catch (Exception $e) {
    echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
}
