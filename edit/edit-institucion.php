<?php 
require_once('../cusuario.php');


if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('institucion','*',' AND id_institucion="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);

	$data	=	array(
					'nombre_inst'=>$nombre_inst,
					'descripcion_inst'=>$descripcion_inst,
					'datos_contacto'=>$datos_contacto,
					'correo_inst'=>$correo_inst,
					
					);
	$update	=	$db->update('institucion',$data,array('id_institucion'=>$editId));
	if($update){
		header('location:../index.php?msg=rus');
		exit;
	}else{
		header('location:../index.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Editar Institucion </title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<?php  include_once('navbar.php');?>
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
			</header>
		</div> <!--/.container-->
	</div>
	
	
   	<div class="container">
		<h1><a href="#">Edita Institucion</a></h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Editar Institucion </strong> <a href="../index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar </a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Todos los campos con  <span class="text-danger">*</span> son obligatorios!</h5>
					<form method="post">
						<div class="form-group">
							<label>Nombre<span class="text-danger">*</span></label>
							<input type="text" name="nombre_inst" id="nombre_inst" class="form-control" value="<?php echo $row[0]['nombre_inst']; ?>" placeholder="Ingresa Nombre" required>
						</div>
						<div class="form-group">
							<label>Descripcion<span class="text-danger">*</span></label>
							<input type="text" name="descripcion_inst" id="descripcion_inst" class="form-control" value="<?php echo $row[0]['descripcion_inst']; ?>" placeholder="Ingresa Descripcion" required>
						</div>
						<div class="form-group">
							<label>Datos Contacto <span class="text-danger">*</span></label>
							<input type="text" name="datos_contacto" id="datos_contacto"  class="form-control" value="<?php echo $row[0]['datos_contacto']; ?>" placeholder="Ingresa Contacto" required>
						</div>
						<div class="form-group">
							<label>Correo Institucional<span class="text-danger">*</span></label>
							<input type="email" name="correo_inst" id="correo_inst" class="form-control" value="<?php echo $row[0]['correo_inst']; ?>" placeholder="Ingresa Correo" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
<footer>
<?php include_once('../footer.php');	?>
</footer>
</html>