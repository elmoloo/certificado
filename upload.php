<?php
require_once('cusuario.php');

//session_start();
//if (!isset($_SESSION['usuario'])) {
//	header('Location: ingreso.php');
//}


include_once('az.multi.upload.class.php');

    $rename	=	rand(1000,5000).time();
    $upload	=	new ImageUploadAndResize();
    $upload->uploadMultiFiles('files', 'firmas/firma_coordinador', $rename, 0755);
    
    foreach($upload->prepareNames as $name){
        $sql = "INSERT INTO coordinador (imagen_co)";
         $flag	=	0;
        if ($conexion->query($sql) === TRUE) {
            $flag	=	1;
            $info = new SplFileInfo($name);
            //move_uploaded_file("/var/www/html/smistms/fciheros/".$name,"/var/www/fciheros/".$name);
            //copy("/var/www/html/smistms/ficheros/".$name,"/var/www/ficheros/".$name
            //copy("/var/www/html/smistms/ficheros/".$name,"/var/www/ficheros/".$name)
            if( (strtolower($info->getExtension())=="pdf") or (strtolower($info->getExtension())=="doc" or strtolower($info->getExtension())=="docx" or strtolower($info->getExtension())=="jpg" or strtolower($info->getExtension())=="jpeg")  ){
                if (copy("C:\\xampp\\htdocs\\mariano_certificado\\firmas\\firma_coordinador\\".$name,"C:\\firmas\\firma_coordinador\\".$name))
                {
                    //unlink("C:\\xampp\\htdocs\\SMistms\\ficheros\\".$name);
                    //unlink("/var/www/html/smistms/ficheros/".$name);
                    echo "Se ha movido el fichero correctamente"; 
                }
                else
                {echo "Error, no se ha podido copiar el fichero";return;}
            }
            else
            {echo "<br>ERROR, La extensión no es adecuada";}
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
    
    if($flag	=	1){
        header('location:add-coordinador.php?msg=ras');
        exit;
    }
    ?>