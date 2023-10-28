
 <?php 
 require_once("db.php");

 include_once('config.php');
 
 
 $id_especialidad=$_REQUEST['id_especialidad'];
	
 $id_periodoac=$_REQUEST['id_periodoac'];
 
$consulta_esp = $pdo->query("SELECT * FROM  especialidad where id_especialidad=".$id_especialidad.";");  
$consulta1 = $consulta_esp->fetchAll(PDO::FETCH_OBJ);    
foreach($consulta1  as $especialidad){
    $espec	=	$especialidad->nombre.rand(1000,5000).time();

}
    
    header("Content-Type:application/xls");
    header("Content-Disposition: attachment; filename= $espec-.xls");




    $sql="select DISTINCT periodo_academico.nombre_periac,especialidad.nombre,periodo.nombre_periodo, ";
    $sql=$sql."estudiante.apellido_1,estudiante.apellido_2,estudiante.nombre_1,estudiante.nombre_2,estudiante.tipo_documento,estudiante.numero_documento, ";
    $sql=$sql."estudiante.fecha_nacimento,estudiante.direccion,estudiante.telefono_fijo,estudiante.telefono_celular,estudiante.correo,estudiante.correo_institucional,";
    $sql=$sql."estudiante.codigo_estudiante ";
    $sql=$sql."from estudiante,especialidad,periodo_academico,periodo,detalle_matricula ";
    $sql=$sql."where detalle_matricula.id_estudiante=estudiante.id_estudiante AND detalle_matricula.id_especialidad=especialidad.id_especialidad ";
    $sql=$sql."AND detalle_matricula.id_periodoac=periodo_academico.id_periodoac AND detalle_matricula.id_periodo=periodo.id_periodo ";
    $sql=$sql."AND detalle_matricula.id_especialidad=".$id_especialidad." AND detalle_matricula.id_periodoac=".$id_periodoac."  ";
    $sql=$sql." ORDER BY periodo_academico.nombre_periac,especialidad.nombre,periodo.nombre_periodo,estudiante.apellido_1,estudiante.apellido_2,estudiante.nombre_1, estudiante.nombre_2 ";
    //echo "<br>".$sql."<br>";

    $consulta = $pdo->query($sql);	
    $estudiante = $consulta->fetchAll(PDO::FETCH_OBJ);


    $consulta_esp = $pdo->query("SELECT * FROM  especialidad where id_especialidad=".$id_especialidad.";");  
    $consulta1 = $consulta_esp->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta1  as $especialidad){
       
    
    $consulta_perac = $pdo->query("SELECT * FROM  periodo_academico where id_periodoac=".$id_periodoac.";");  
    $consulta3 = $consulta_perac->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta3  as $perioac){


 ?>
<table border="1">
<tr>
<h5>CARRERA : <?php echo utf8_decode($especialidad->nombre);  ?></h5><h5>PERIODO : <?php echo utf8_decode($perioac->nombre_periac);  ?></h5>
<?php
} 
}
 ?>   

<table border="1">
<td>Nro</td>    
<td><?php echo utf8_decode("Periodo académico");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Especialidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Periodo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Nro. Documento&nbsp;&nbsp;&nbsp;</td>
<td>1er apellido&nbsp;&nbsp;&nbsp;</td>
<td>2do apellido&nbsp;&nbsp;&nbsp;</td>
<td>1er nombre&nbsp;&nbsp;&nbsp;</td>
<td>2do nombre&nbsp;&nbsp;&nbsp;</td>
<td>Nombre completo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>F. Nacimiento&nbsp;&nbsp;&nbsp;</td>
<td><?php echo utf8_decode("Dirección");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php echo utf8_decode("Teléfono");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php echo utf8_decode("Teléfono celular");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Correo personal&nbsp;&nbsp;&nbsp;</td>
<td>Correo institucional&nbsp;&nbsp;&nbsp;</td>
<td><?php echo utf8_decode("Código");?>&nbsp;&nbsp;&nbsp;</td>
</tr>
<?php
$i=0;
foreach($estudiante as $est){
    $i++;
  ?>
<tr>
    <td><?php echo utf8_decode($i) ?></td>
    <td><?php echo utf8_decode($est->nombre_periac)  ?></td>
    <td><?php echo utf8_decode($est->nombre)  ?></td>
    <td><?php echo utf8_decode($est->nombre_periodo)  ?></td>    
    <td><?php echo utf8_decode($est->numero_documento)  ?></td>
    <td><?php echo utf8_decode($est->apellido_1);  ?></td>
    <td><?php echo utf8_decode($est->apellido_2);  ?></td>
    <td><?php echo utf8_decode($est->nombre_1);  ?></td>
    <td><?php echo utf8_decode($est->nombre_2);  ?></td>
    <td><?php echo utf8_decode($est->apellido_1)." ". utf8_decode($est->apellido_2)." ".utf8_decode($est->nombre_1)." ".utf8_decode($est->nombre_2);  ?></td>
    <td><?php echo utf8_decode($est->fecha_nacimento)  ?></td>
    <td><?php echo utf8_decode($est->direccion);  ?></td>
    <td><?php echo utf8_decode($est->telefono_fijo);  ?></td>
    <td><?php echo utf8_decode($est->telefono_celular);  ?></td>
    <td><?php echo utf8_decode($est->correo);  ?></td>
    <td><?php echo utf8_decode($est->correo_institucional);  ?></td>
    <td><?php echo utf8_decode($est->codigo_estudiante);  ?></td>
</tr>
<?php
} 
 ?>   
</table>


	

   
   

