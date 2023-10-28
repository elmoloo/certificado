<?php 
require_once('usuario.php');
session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location: ingreso.php');
}
		require_once("db.php");
		include_once('navbar.php');

include_once('config.php');
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<style type="text/css">
	img { border:0;}
</style>

<body>
	<?php
	$condition	=	'';
	if(isset($_REQUEST['usuario']) and $_REQUEST['usuario']!=""){
		$condition	.=	' AND usuario LIKE "%'.$_REQUEST['usuario'].'%" ';
	}
	if(isset($_REQUEST['rol']) and $_REQUEST['rol']!=""){
		$condition	.=	' AND rol LIKE "%'.$_REQUEST['rol'].'%" ';
	}
	if(isset($_REQUEST['accion']) and $_REQUEST['accion']!=""){
		$condition	.=	' AND accion LIKE "%'.$_REQUEST['accion'].'%" ';
	}
		if(isset($_REQUEST['ip']) and $_REQUEST['ip']!=""){
		$condition	.=	' AND ip LIKE "%'.$_REQUEST['ip'].'%" ';
	}
	if(isset($_REQUEST['so']) and $_REQUEST['so']!=""){
		$condition	.=	' AND so LIKE "%'.$_REQUEST['so'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('logs','*',$condition,'ORDER BY id  DESC limit 30 ');
	?>

   	<div class="container">
	   <br>
	   </div>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>logs de usuarios</strong> </div>
			<div class="card-body">
			<div class="form-group">							
							<label for="logs">Tipo de Usuario</label>
							<?php 							
								$consulta = $pdo->query("SELECT * FROM  logs");	
								$especialidades = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
								//SELECT logs.id, logs.usuario, logs.rol, logs.accion, logs.ip, logs.so, logs.dt, docente.id_docente, docente.nombre, docente.apellidos FROM logs INNER JOIN docente ON docente.id_docente = logs.usuario WHERE logs.rol="Docente"
								//SELECT logs.id, logs.usuario, logs.rol, logs.accion, logs.ip, logs.so, logs.dt, usuarios.id, usuarios.nombre FROM logs INNER JOIN usuarios ON usuarios.id = logs.usuario WHERE logs.rol="Administrador"
							?>
							<select id="rol"name="rol"class="form-control">
								
															
									<option  value="0">SELECCIONE El ROL A CONSULTAR</option>
								
									<option  value="Docente">Docente</option>
									<option  value="Administrador">Administrador</option>
								
							</select>						

						</div>
						<div class="col-sm-3">
								<div class="form-group">
									<label>fecha</label>
									<input type="text" name="dt" id="dt" class="form-control" value="<?php echo isset($_REQUEST['dt'])?$_REQUEST['dt']:''?>" placeholder="Ingresar fecha">
								</div>
								</div>
								<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Buscar</button><br><br><a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Limpiar</a>
									</div>
								</div>
							</div>
							
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Reporte eliminado exitosamente!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Reporte actualizado exitosamente!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> No se ha realizado ningun cambio!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Algo salio mal <strong>Please try again!</strong></div>';
				}
				?>
			</div>
		</div>
			
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
						<th>ID</th>
						<th>Nombre</th>
						<th>Acccion</th>
						<th>ip</th>
                        <th>sistema operativo</th>
						<th>fecha</th>
						
					</tr>
				</thead>
				<tbody>
					
					<?php 
							//echo $val['id_periodo'];
							$consulta_nombredo=	'';
							$consulta_nombredo = $pdo->query('SELECT logs.id, logs.usuario, logs.rol, logs.accion, logs.ip, logs.so, logs.dt, docente.id_docente, docente.nombre, docente.apellidos FROM logs INNER JOIN docente ON docente.id_docente = logs.usuario WHERE logs.rol="Docente"');	
							$docente = $consulta_nombredo->fetchAll();
							
							foreach ($docente as $do=>$val){
								?>
					<tr>
						<td><?php echo $val["id"]?></td>
						<td><?php echo $val['nombre']." ". $val['apellido'];?></td>
						<td><?php echo $val['accion'];?></td>
                        <td><?php echo $val['ip'];?></td>
						<td><?php echo $val['so'];?></td>
						<td><?php echo $val['dt'];?></td>
						
													
					</tr>
					<?php
					} 
					?>
							
					
						
					
							
					
					
					
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
<footer>
<?php include_once('../footer.php');	?>
</footer>
</html>
