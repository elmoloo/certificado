<?php include_once('config.php');
	include_once('navbar.php');
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP CRUD in Bootstrap with search and pagination</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
			<header class="blog-header py-1">
			</header>
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['nombre_es']) and $_REQUEST['nombre_es']!=""){
		$condition	.=	' AND nombre_es LIKE "%'.$_REQUEST['nombre_es'].'%" ';
	}
	if(isset($_REQUEST['apellido_es']) and $_REQUEST['apellido_es']!=""){
		$condition	.=	' AND apellido_es LIKE "%'.$_REQUEST['apellido_es'].'%" ';
	}
	if(isset($_REQUEST['cedula_es']) and $_REQUEST['cedula_es']!=""){
		$condition	.=	' AND cedula_es LIKE "%'.$_REQUEST['cedula_es'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('estudiante','*',$condition,'ORDER BY id_estudiante DESC');
	?>
   	<div class="container">
		<h1><a href="#">Administracion de Certificado  </a></h1>
		<thead>
		<div class="card-body">
            <table class="table table-hover">
            <thead>
              <form >
              <tr>
                <th scope="col">Buscar</th>
                <th scope="col">
                  <input required type="hidden" class="form-control" name="accion" id="accion" value="BUSCAR">
                  <input type="text"class="form-control" name="txtBuscar" id="txtBuscar" value="" placeholder="Ingrese el nombre a buscar">
                </th>
                <th scope="col">
                <button name="submit" id="submit" value="submit"  type="submit" class="btn btn-primary">Buscar</button>

                </th>
                <th scope="col"></th>
              </tr>
              </form>
		
				<div>
				<thead>
					<tr class="bg-primary text-white">
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Cedula</th>
						
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
            if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
              extract($_REQUEST);
              if($accion=="BUSCAR");
              $condition=" and descripcion like '%".$txtBuscar."%' ";
          }else{
              $condition="";
          }
                                        if(count($userData)>0){
                                            $s	=	'';
                                            foreach($userData as $val){
                                                $s++;
					?>
					<tr>
						 
						<td><?php echo $s;?></td>
						<td><?php echo $val['nombre_es'];?></td>
						<td><?php echo $val['apellido_es'];?></td>
						<td><?php echo $val['cedula_es'];?></td>
						
						<td align="center">
							<a href="edit/edit-estudiante.php?editId=<?php echo $val['id_estudiante'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="delete/delete-estudiante.php?delId=<?php echo $val['id_estudiante'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>| 
							<a href="añadir_al_certificado.php?editId=<?php echo $val['id_estudiante'];?>" class="text-primary"><i class="fas fa-user-plus"></i> Añadir datos Certificado </a> | 
						

						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No hay datos almacenados!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
</body>
</html>
