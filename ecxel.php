
 <?php 
 require_once("db.php");

 include_once('config.php');
 
 
 $id_especialidad=$_REQUEST['id_especialidad'];
	
 $id_periodoac=$_REQUEST['id_periodoac'];
 
 $id_periodo=$_REQUEST['id_periodo'];
 
 $id_asignatura=$_REQUEST['id_asignatura'];

 $paralelo=$_REQUEST['paralelo'];

$consulta_esp = $pdo->query("SELECT * FROM  especialidad where id_especialidad=".$id_especialidad.";");  
$consulta1 = $consulta_esp->fetchAll(PDO::FETCH_OBJ);    
foreach($consulta1  as $especialidad){
    $espec= $especialidad->nombre;
   

}
$consulta_per = $pdo->query("SELECT * FROM  periodo where id_periodo=".$id_periodo.";");  
$consulta2 = $consulta_per->fetchAll(PDO::FETCH_OBJ);    
foreach($consulta2  as $periodo){
    $per= $periodo->nombre_periodo;
   

}

$consulta_asig = $pdo->query("SELECT * FROM  asignatura where id_asignatura=".$id_asignatura.";");  
$consulta3 = $consulta_asig->fetchAll(PDO::FETCH_OBJ);    
foreach($consulta3  as $asigg){
    $asog= $asigg->nombre_asig;
   

}



    header("Content-Type:application/xls");
    header("Content-Disposition: attachment; filename= $espec-$per-$asog.xls");




    $sql="select periodo.nombre_periodo,asignatura.nombre_asig,estudiante.* ";
    $sql=$sql."from estudiante,especialidad,periodo_academico,periodo,detalle_matricula,asignatura ";
    $sql=$sql."where detalle_matricula.id_estudiante=estudiante.id_estudiante AND detalle_matricula.id_especialidad=especialidad.id_especialidad ";
    $sql=$sql."AND detalle_matricula.id_periodoac=periodo_academico.id_periodoac AND detalle_matricula.id_periodo=periodo.id_periodo ";
    $sql=$sql."AND detalle_matricula.id_asignatura=asignatura.id_asignatura ";
    $sql=$sql."AND detalle_matricula.id_especialidad=".$id_especialidad." AND detalle_matricula.id_periodoac=".$id_periodoac." and detalle_matricula.id_periodo=".$id_periodo." ";
    $sql=$sql."AND detalle_matricula.id_asignatura=".$id_asignatura."  ";
    $sql=$sql."AND detalle_matricula.paralelo='".$paralelo."' ";
    $sql=$sql." ORDER BY estudiante.apellido_1,estudiante.apellido_2,estudiante.nombre_1, estudiante.nombre_2 ";
    //echo "<br>".$sql."<br>";
    $consulta = $pdo->query($sql);	
    $estudiante = $consulta->fetchAll(PDO::FETCH_OBJ);


    $consulta_esp = $pdo->query("SELECT * FROM  especialidad where id_especialidad=".$id_especialidad.";");  
    $consulta1 = $consulta_esp->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta1  as $especialidad){
       
    
    $consulta_per = $pdo->query("SELECT * FROM  periodo where id_periodo=".$id_periodo.";");  
    $consulta2 = $consulta_per->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta2  as $perio){


    $consulta_perac = $pdo->query("SELECT * FROM  periodo_academico where id_periodoac=".$id_periodoac.";");  
    $consulta3 = $consulta_perac->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta3  as $perioac){


    $consulta_asig = $pdo->query("SELECT * FROM  asignatura where id_asignatura=".$id_asignatura.";");  
    $consulta4 = $consulta_asig->fetchAll(PDO::FETCH_OBJ);    
    foreach($consulta4  as $asig){
       
    
 ?>
<table border="1">
<tr>


<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instituto Superior Tecnologico "Mariano Samaniego"</h5>


<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El instituto catolico de la frontera sur</h5>
<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRO DE ASISTENCIA</h5>

<h5>CARRERA : <?php echo utf8_decode($especialidad->nombre);  ?></h5><h5>PERIODO : <?php echo utf8_decode($perioac->nombre_periac);  ?></h5>
<h5>PROFESOR : </h5><h5>CICLO : <?php echo $perio->nombre_periodo;  ?></h5>
<h5>ASIGNATURA : <?php echo utf8_decode($asig->nombre_asig);  ?></h5>
<h5>MES : </h5>

<?php
} 
}
}
}
 ?>   

<table border="1">
<td>Nro</td>    
<td>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dia</td>
<td>1&nbsp;&nbsp;&nbsp;</td>
<td>2&nbsp;&nbsp;&nbsp;</td>
<td>3&nbsp;&nbsp;&nbsp;</td>
<td>4&nbsp;&nbsp;&nbsp;</td>
<td>5&nbsp;&nbsp;&nbsp;</td>
<td>6&nbsp;&nbsp;&nbsp;</td>
<td>7&nbsp;&nbsp;&nbsp;</td>
<td>8&nbsp;&nbsp;&nbsp;</td>
<td>9&nbsp;&nbsp;&nbsp;</td>
<td>10&nbsp;&nbsp;&nbsp;</td>
<td>11&nbsp;&nbsp;&nbsp;</td>
<td>12&nbsp;&nbsp;&nbsp;</td>
<td>13&nbsp;&nbsp;&nbsp;</td>
<td>14&nbsp;&nbsp;&nbsp;</td>
<td>15&nbsp;&nbsp;&nbsp;</td>
<td>16&nbsp;&nbsp;&nbsp;</td>
<td>17&nbsp;&nbsp;&nbsp;</td>
<td>18&nbsp;&nbsp;&nbsp;</td>
<td>19&nbsp;&nbsp;&nbsp;</td>
<td>20&nbsp;&nbsp;&nbsp;</td>
<td>21&nbsp;&nbsp;&nbsp;</td>
<td>22&nbsp;&nbsp;&nbsp;</td>
<td>23&nbsp;&nbsp;&nbsp;</td>
<td>24&nbsp;&nbsp;&nbsp;</td>
<td>25&nbsp;&nbsp;&nbsp;</td>
<td>26&nbsp;&nbsp;&nbsp;</td>
<td>27&nbsp;&nbsp;&nbsp;</td>
<td>28&nbsp;&nbsp;&nbsp;</td>
<td>29&nbsp;&nbsp;&nbsp;</td>
<td>30&nbsp;&nbsp;&nbsp;</td>
<td>31&nbsp;&nbsp;&nbsp;</td>
<td>TCR&nbsp;&nbsp;&nbsp;</td>
<td>TCD&nbsp;&nbsp;&nbsp;</td>



</tr>
<?php
$i=0;
foreach($estudiante as $est){
    $i++;
  ?>
<tr>
    <td><?php echo utf8_decode($i) ?></td>
    <td><?php echo utf8_decode($est->apellido_1)." ". utf8_decode($est->apellido_2)." ".utf8_decode($est->nombre_1)." ".utf8_decode($est->nombre_2);  ?></td>
    <td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

</tr>
<?php
} 
 ?>   
</table>


	

   
   

