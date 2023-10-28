<?php 
require_once('../cusuario.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('curso','*',' AND id_curso="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nombre_cur==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'id_coordinador'=>$id_coordinador,
					'id_facilitador'=>$id_facilitador,
					'id_rector'=>$id_rector,
					'id_institucion'=>$id_institucion,
					'nombre_cur'=>$nombre_cur,
					'contenido_cur'=>$contenido_cur,
					'num_horas'=>$num_horas,
					'tipo_curso'=>$tipo_curso,
					'tipo_aprobacion'=>$tipo_aprobacion,
					'duracion_cur'=>$duracion_cur,
					'fecha_inicio'=>$fecha_inicio,
					'fecha_fin'=>$fecha_fin,
					'fecha_certificado'=>$fecha_certificado,
					'desc_cur'=>$desc_cur,
					);
	$update	=	$db->update('curso',$data,array('id_curso'=>$editId));
	if($update){
		header('location:/mariano_certificado/curso.php?msg=rnu');
		exit;
	}else{
		header('location:/mariano_certificado/curso.php?msg=rus');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edita tu Curso </title>
	
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
<?php include_once('navbar.php');?>
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
			</header>
		</div> <!--/.container-->
	</div>
	
	
   	<div class="container">
		<h1><a href="#">Edita Curso</a></h1>
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Editar curso </strong> <a href="../curso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Todos los campos con  <span class="text-danger">*</span> son obligatorios!</h5>
					<form method="post">
					
						<div class="form-group">
							<label>Institucion<span class="text-danger">*</span></label>

							<select id="id_institucion" name="id_institucion" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  institucion");	
									$institu = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($institu as $pro){ 
										if($pro->id_institucion==$row[0]['id_institucion'])					
											echo "<option  value='".$pro->id_institucion."' selected>".$pro->nombre_inst."</option>";
										else
											echo "<option  value='".$pro->id_institucion."' >".$pro->nombre_inst."</option>";
																	} ?>
							</select>						

						</div>

						<div class="form-group">
						<label>Nombre de el Curso <span class="text-danger">*</span></label>
						<input type="text" name="nombre_cur" id="nombre_cur" class="form-control" value="<?php echo $row[0]['nombre_cur']; ?>" placeholder="Ingresa Nombre de Curso" required>
						</div>

						<div class="form-group">
						<label>Contenido de el Curso <span class="text-danger">*</span></label>
						<input type="text" name="contenido_cur" id="contenido_cur" class="form-control" value="<?php echo $row[0]['contenido_cur']; ?>" placeholder="Ingresa Contenido" required>
						</div>

							<div class="form-group">
							<label>Coordinador<span class="text-danger">*</span></label>

							<select id="id_coordinador" name="id_coordinador" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  coordinador");	
									$coord = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($coord as $pro){ 
										if($pro->id_coordinador==$row[0]['id_coordinador'])					
											echo "<option  value='".$pro->id_coordinador."' selected>".$pro->nombre_co. "\n".$pro->apellido_co."</option>";
										else
											echo "<option  value='".$pro->id_coordinador."' >".$pro->nombre_co."\n".$pro->apellido_co."</option>";
																	} ?>
							</select>						

						</div>

						<div class="form-group">
							<label>Facilitador<span class="text-danger">*</span></label>

							<select id="id_facilitador" name="id_facilitador" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  facilitador");	
									$facili = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($facili as $pro){ 
										if($pro->id_facilitador==$row[0]['id_facilitador'])					
											echo "<option  value='".$pro->id_facilitador."' selected>".$pro->nombre_fa. "\n".$pro->apellido_fa."</option>";
										else
											echo "<option  value='".$pro->id_facilitador."' >".$pro->nombre_fa."\n".$pro->apellido_fa."</option>";
																	} ?>
							</select>						

						</div>

						<div class="form-group">
							<label>Rector<span class="text-danger">*</span></label>

							<select id="id_rector" name="id_rector" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  rector");	
									$rector = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($rector as $pro){ 
										if($pro->id_rector==$row[0]['id_rector'])					
											echo "<option  value='".$pro->id_rector."' selected>".$pro->nombre_re. "\n".$pro->apellido_re."</option>";
										else
											echo "<option  value='".$pro->id_rector."' >".$pro->nombre_re."\n".$pro->apellido_re."</option>";
																	} ?>
							</select>						
						</div>

						
						<div class="form-group">
						<label>Numero de Horas <span class="text-danger">*</span></label>
						<input type="text" name="num_horas" id="num_horas" class="form-control" value="<?php echo $row[0]['num_horas']; ?>" placeholder="Ingresa Numero de Horas" required>
						</div>

						<div class="form-group">
						<label>Tipo de Curso <span class="text-danger">*</span></label>
						<input type="text" name="tipo_curso" id="tipo_curso" class="form-control" value="<?php echo $row[0]['tipo_curso']; ?>" placeholder="Ingresa Tipo de Curso" required>
						</div>

						<div class="form-group">
						<label>Tipo de Aprobacion <span class="text-danger">*</span></label>
						<input type="text" name="tipo_aprobacion" id="tipo_aprobacion" class="form-control" value="<?php echo $row[0]['tipo_aprobacion']; ?>" placeholder="Ingresa Tipo  de Aprobacion" required>
						</div>

						<div class="form-group">
						<label>Duracion de Curso <span class="text-danger">*</span></label>
						<input type="text" name="dur_cur" id="duracion_cur" class="form-control" value="<?php echo $row[0]['duracion_cur']; ?>" placeholder="Ingresa Duracion de Curso" required>
						</div>

						<div class="form-group">
						<label>Fecha de Inicio <span class="text-danger">*</span></label>
						<input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $row[0]['fecha_inicio']; ?>" placeholder="Ingresa fecha  inicio de Curso" required>
						</div>

						<div class="form-group">
						<label>Fecha Final <span class="text-danger">*</span></label>
						<input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php echo $row[0]['fecha_fin']; ?>" placeholder="Ingresa fecha final de Curso" required>
						</div>

						<div class="form-group">
						<label>Fecha de Certificado <span class="text-danger">*</span></label>
						<input type="date" name="fecha_certificado" id="fecha_certificado" class="form-control" value="<?php echo $row[0]['fecha_certificado']; ?>" placeholder="Ingresa fecha certificado de Curso" required>
						</div>

						<div class="form-group">
						<label>Descripcion <span class="text-danger">*</span></label>
						<input type="text" name="desc_cur" id="desc_cur" class="form-control" value="<?php echo $row[0]['desc_cur']; ?>" placeholder="Ingresa Descripcion de Curso" required>
						</div>

						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i>Guardar</button>
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