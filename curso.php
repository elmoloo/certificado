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
	if(isset($_REQUEST['nombre_cur']) and $_REQUEST['nombre_cur']!=""){
		$condition	.=	' AND nombre_cur LIKE "%'.$_REQUEST['nombre_cur'].'%" ';
	}
	if(isset($_REQUEST['tipo_curso']) and $_REQUEST['tipo_curso']!=""){
		$condition	.=	' AND tipo_curso LIKE "%'.$_REQUEST['tipo_curso'].'%" ';
	}
	if(isset($_REQUEST['duracion_cur']) and $_REQUEST['duracion_cur']!=""){
		$condition	.=	' AND duracion_cur LIKE "%'.$_REQUEST['duracion_cur'].'%" ';
	}
	if(isset($_REQUEST['nombre_co']) and $_REQUEST['nombre_co']!=""){
		$condition	.=	' AND nombre_co LIKE "%'.$_REQUEST['nombre_co'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('curso','*',$condition,'ORDER BY id_curso DESC');
	?>
   	<div class="container">
		<h1><a href="#">Administracion de Curso  </a></h1>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Buscador de Curso</strong> <a href="add/add-curso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Añadir Curso</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> El dato a sido eliminado correctamente!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> El dato a sido actualizado correctamente!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> No se realizo ningun cambio!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Encontrar Curso</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nombre </label>
									<input type="text" name="nombre_cur" id="nombre_cur" class="form-control" value="<?php echo isset($_REQUEST['nombre_cur'])?$_REQUEST['nombre_cur']:''?>" placeholder="Escribe nombre del curso">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Tipo de Curso</label>
									<input type="text" name="tipo_curso" id="tipo_curso" class="form-control" value="<?php echo isset($_REQUEST['tipo_curso'])?$_REQUEST['tipo_curso']:''?>" placeholder=" Escribe tipo de curso">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Duracion</label>
									<input type="int" name="duracion_cur" id="duracion_cur" class="form-control" value="<?php echo isset($_REQUEST['duracion_cur'])?$_REQUEST['duracion_cur']:''?>" placeholder="Escribe duracion del curso">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Buscar</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i>Limpiar </a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>id#</th>
						<th>Nombre</th>
						<th>Contenido</th>
						<th>Numero de Horas</th>
						<th>Coordinador</th>
						
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['nombre_cur'];?></td>
						<td><?php echo $val['contenido_cur'];?></td>
						<td><?php echo $val['num_horas'];?></td>
						<td><?php echo $val['nombre_co'];?></td>
						
						<td align="center">
							<a href="edit/edit-curso.php?editId=<?php echo $val['id_curso'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="delete/delete-curso.php?delId=<?php echo $val['id_curso'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>  | 
							<a href="estudiante-curso.php?editId=<?php echo $val['id_curso'];?>" class="text-primary"><i class="fas fa-user-plus"></i> Añadir  Estudiante </a> | 
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
