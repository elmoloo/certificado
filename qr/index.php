<?php
include "qrcode.php"; 
// Create QRcode object 
$qc = new QrCode(); 

// create text QR code 
//$qc->TEXT("Curso:"); 
// URL QR code 
//$qc->URL('localhost/mariano_certificado/certificado.php');
 
// render QR code
$qc->QRCODE(400,"xample024.png");


// EMAIL QR code 
//$qc->EMAIL('info@techiesbadi.in', 'SUBJECT', 'MESSAGE');
 
// PHONE QR code 
//$qc->PHONE('PHONENUMBER');
 
// SMS QR code 
//$qc->SMS('PHONENUMBER', 'MESSAGE');
?>