<?php
require_once("db.php");
require_once("decode.php");
require_once('cusuario.php');
require('assets/reportes_pdf/fpdf.php');
//require('phpqrcode/qrlib.php');


 //Cargar la biblioteca qrcode
// require_once('vendor/autoload.php');
 //Indicar que usaremos el namespace de QRCode
 //use chillerlan\QRCode\QRCode;


  
$id_estudiante_curso=$_REQUEST["id_estudiante_curso"];
$id_estudiante=$_REQUEST["id_estudiante"];
$id_curso=$_REQUEST["id_curso"];
$id_coordinador=$_REQUEST["id_coordinador"];
$id_facilitador=$_REQUEST["id_facilitador"];
$id_rector=$_REQUEST["id_rector"];
//$id_institucion=$_REQUEST["id_institucion"];


$consulta =$pdo->prepare("SELECT * FROM estudiante where id_estudiante=".$id_estudiante.";");
$consulta->execute();
$estudiante = $consulta->fetch(PDO::FETCH_ASSOC);
//echo"aqui".$estudiante["nombre_es"].$estudiante["apellido_es"]; 

$consulta =$pdo->prepare("SELECT * FROM curso where id_curso =" .$_REQUEST['id_curso'].";");
$consulta->execute();
$curso = $consulta->fetch(PDO::FETCH_ASSOC);
//echo"consulta1";


$consulta =$pdo->prepare("SELECT * FROM curso CROSS JOIN coordinador WHERE coordinador.id_coordinador = " .$_REQUEST['id_coordinador'].";" );
$consulta->execute();
$coordinador = $consulta->fetch(PDO::FETCH_ASSOC);

$consulta =$pdo->prepare("SELECT * FROM curso CROSS JOIN facilitador WHERE facilitador.id_facilitador = " .$_REQUEST['id_facilitador'].";" );
$consulta->execute();
$facilitador = $consulta->fetch(PDO::FETCH_ASSOC);

$consulta =$pdo->prepare("SELECT * FROM curso CROSS JOIN rector WHERE curso.id_rector= " .$_REQUEST['id_rector'].";" );
$consulta->execute();
$rector = $consulta->fetch(PDO::FETCH_ASSOC);

//----------------------echo"consulta14";


$cedula=$estudiante["cedula_es"];
$estudiantecert=$estudiante["nombre_es"].$estudiante["apellido_es"];
$estudiante=$estudiante["nombre_es"]."\n".$estudiante["apellido_es"];
$coordinador=$coordinador["nombre_co"]."\n".$coordinador["apellido_co"];;
$facilitador=$facilitador["nombre_fa"]."\n".$facilitador["apellido_fa"];
$rector=$rector["nombre_re"]."\n".$rector["apellido_re"];
$horas=$curso["num_horas"];
$curso=$curso["nombre_cur"];
//$fecha_certificado=$curso["fecha_certificado"];

//echo"consulta";

// Genera un nombre de archivo único
$nombre_archivo =('certificado_') .$estudiantecert. '.pdf';

// Ruta al archivo de contador de certificados
$archivoContador = 'contador_certificados.txt';

// Obtener el valor actual del contador
$contadorActual = file_exists($archivoContador) ? intval(file_get_contents($archivoContador)) : 0;

// Incrementar el contador
$contadorNuevo = $contadorActual + 1;

//-------------------------------------------------------------------
include "qr/qrcode.php";   
 
// Create QRcode object   
$qc = new QRcode(); 

$qc->TEXT($estudiante."\n".$cedula."\n".$curso); 

// render QR code
//$qc->QRCODE(400,"C:/xampp/htdocs/mariano_certificado/codigos_QR/qr_$estudiantecert.png");
$qc->QRCODE(400,"/var/www/html/certificado/codigos_QR/qr_$estudiantecert.png");
//-------------------------------------------------------------------

// Crear instancia FPDF
$pdf = new FPDF('L', 'mm', 'letter')  ;

$pdf->AddPage('LANDSCAPE'.'LETTER');


$nombre_archivo = "certificado_$estudiantecert.pdf";


// Cargar la imagen de plantilla
$plantillaPath = 'assets/images/modelo.jpg';
$pdf->Image($plantillaPath,-10,-22,299,259);

    // Cargar la imagen QR
$QR = "codigos_QR/qr_$estudiantecert.png";
$pdf->Image($QR,47,50,35,35);

// Agregar el número de certificado al inicio del texto
{$pdf->SetFont('Times','',13);
    $numeroCertificado = "Certificado ITSMS-2023: 0$contadorNuevo";
    $pdf->SetXY(75,8);
    $pdf->Cell(-6, 9, $numeroCertificado, 0, 0, 'C');
    
    // Agregar la fecha actual
    
    $fechaActual = date('d/M/Y');
    $pdf->SetXY(75, 8);
    $pdf->Cell(252, 9, "Cariamanga $fechaActual", 0, 0, 'C');}
    
    
    // Nombre del archivo de salida
    $archivoSalida = "certificado_$contadorNuevo.pdf";
    
    // Incrementar el contador y guardarlo en el archivo
    file_put_contents($archivoContador, $contadorNuevo);

   //echo"consulta";

 
//echo"consulta4";

    // Arial bold 15
    $pdf->SetFont('Times','',25);
    // Movernos a la derecha
    // Título
    $pdf->Cell(80);
 
   //Function utf8_encode() is deprecated in ... on line ...
 
    $pdf->Ln(6);
    $pdf->Cell(280,40,utf8_to_iso8859_1('INSTITUTO SUPERIOR TECNOLÓGICO'),0,1,'C');
    $pdf->Cell(285,-15,utf8_to_iso8859_1('"MARIANO SAMANIEGO"'),0,1,'C');
    
   
// Salto de línea
$pdf->SetFont('Times','',17);
// Movernos a la derecha
$pdf->Cell(80);
$pdf->Cell(118,75,utf8_to_iso8859_1('Confiere el presente certificado a:'),0,1,'C');
$pdf->Cell(80);
$pdf->Ln(6);
$pdf->SetFont('Times','BI',38);
$pdf->Cell(290,-45,utf8_to_iso8859_1( $estudiante),0,1,'C');
$pdf->Ln(7);
$pdf->Cell(80);
$pdf->SetFont('Times','',17);
$pdf->Cell(130,80,utf8_to_iso8859_1("Con número de cédula  ".$cedula."\n"."por haber aprobado el curso con el tema:"),0,1,'C');
$pdf->Cell(80);
$pdf->SetFont('Times','B',17);
$pdf->Ln(3);
$pdf->Cell(270,-67,utf8_to_iso8859_1('"'.$curso.'"'),0,1,'C');
$pdf->Ln(3);
$pdf->Cell(80);
$pdf->SetFont('Times','',17);
$pdf->Cell(22,81 ,utf8_to_iso8859_1(' con una duración de'."\n".$horas."\n"."horas."),0,1,'C');





$pdf->Cell(8);
$pdf->SetFont('Times','',12);

$pdf->Cell(300,-5.5,utf8_to_iso8859_1("\n"."$coordinador"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."$rector"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n"."\n".$facilitador),0,1,'C');
$pdf->SetFont('Times','B',15);
$pdf->Ln();

$pdf->Ln(12.8);

$pdf->Cell(144);
$pdf->Cell(25, 5,utf8_to_iso8859_1("Coordinador \n \n \n  \n \n \n \n \n \n \n \n \n \n \n Rector \n \n \n \n \n \n \n    \n \n \n \n \n  \n Facilitador "),0,1,'C');
$pdf->Ln();
$pdf->Ln();
//$pdf->Cell(125);
//$pdf->SetFont('Times','',12);
//$pdf->Cell(200, 20,utf8_to_iso8859_1($facilitador),1,0,'C');
//$pdf->Ln();
//$pdf->Ln(-5);
//$pdf->Cell(153);
//$pdf->Cell(20,-10,utf8_to_iso8859_1("Padre.Mgs.Segundo Pardo Rojas"),1,0,'C');
//$pdf->SetFont('Times','B',15);
//$pdf->Ln(0);
//$pdf->Cell(152);
//$pdf->Cell(20,5,utf8_to_iso8859_1("Rector"),1,1,'C');
//$pdf->Ln(-8);
//$pdf->Cell(210);
//$pdf->Cell(20,8,utf8_to_iso8859_1("Facilitador"),1,1,'C');

// Generar el PDF en memoria
$contenido_pdf =$pdf->Output('S'); // 'S' significa que se generará en una cadena

// Ruta de la carpeta de destino donde quieres guardar el PDF
//$carpeta_destino = "C:/xampp/htdocs/mariano_certificado/certificados/";
$carpeta_destino = "/var/www/html/certificado/certificados/";


// Guardar el PDF en la carpeta de destino
(file_put_contents($carpeta_destino . $nombre_archivo, $contenido_pdf)) ;
//echo 'Certificado generado y almacenado en: ' . $carpeta_destino;
$pdf->Output();
  /* { echo "El certificado PDF se ha guardado con éxito en la carpeta de destino.";

    echo '<a href="certificado.php">Generar QR</a>';
} else {
    echo "Error al guardar el certificado PDF.";
}

*/
?>
