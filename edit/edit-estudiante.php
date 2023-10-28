<?php
 require_once('../cusuario.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('estudiante','*',' AND id_estudiante="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($cedula_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($nombre_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($apellido_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'cedula_es'=>$cedula_es,
					'nombre_es'=>$nombre_es,
					'apellido_es'=>$apellido_es,
					'id_especialidad'=>$id_especialidad,
					'id_periodoac'=>$id_periodoac,
					'genero'=>$genero,
					'fecha_nacimiento'=>$fecha_nacimiento,
					'id_pais'=>$id_pais,
					'id_provincia'=>$id_provincia,
					'id_canton'=>$id_canton,
					'id_ciudad'=>$id_ciudad,
					'telefono_es'=>$telefono_es,
					'correo_es'=>$correo_es,
					
					);
	$update	=	$db->update('estudiante',$data,array('id_estudiante'=>$editId));
	if($update){
		header('location: ../estudiante.php?msg=rus');
		exit;
	}else{
		header('location: ../estudiante.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Editar Estudiante </title>
	
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
		<h1><a href="#">Edita Estudiante</a></h1>
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Editar Estudiante </strong> <a href="../estudiante.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Todos los campos con  <span class="text-danger">*</span> son obligatorios!</h5>
					<form method="post">
						<div class="form-group">
							<label>Cedula<span class="text-danger">*</span></label>
							<input type="int" name="cedula_es" id="cedula_es" class="form-control" value="<?php echo $row[0]['cedula_es']; ?>" placeholder="Ingresa Cedula" required>
						</div>
						<div class="form-group">
							<label>Nombre<span class="text-danger">*</span></label>
							<input type="text" name="nombre_es" id="nombre_es" class="form-control" value="<?php echo $row[0]['nombre_es']; ?>" placeholder="Ingresa Nombre" required>
						</div>
						<div class="form-group">
							<label>Apellido <span class="text-danger">*</span></label>
							<input type="text" name="apellido_es" id="apellido_es"  class="form-control" value="<?php echo $row[0]['apellido_es']; ?>" placeholder="Ingresa Apellido" required>
						</div>

						<div class="form-group">
							<label>Especialidad <span class="text-danger">*</span></label>

							<select id="id_especialidad" name="id_especialidad" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  especialidad");	
									$especialidad = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($especialidad as $pro){ 
										if($pro->id_especialidad==$row[0]['id_especialidad'])					
											echo "<option  value='".$pro->id_especialidad."' selected>".$pro->nombre."</option>";
										else
											echo "<option  value='".$pro->id_especialidad."' >".$pro->nombre."</option>";
																	} ?>
							</select>						

						</div>
					
						<div class="form-group">
							<label>Periodo Academico  <span class="text-danger">*</span></label>

							<select id="id_periodoac" name="id_periodoac" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  periodo_academico");	
									$periodo = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($periodo as $pro){ 
										if($pro->id_periodoac==$row[0]['id_periodoac'])					
											echo "<option  value='".$pro->id_periodoac."' selected>".$pro->nombre_periac."</option>";
										else
											echo "<option  value='".$pro->id_periodoac."' >".$pro->nombre_periac."</option>";
																	} ?>
							</select>						

						</div>
						<div class="form-group">
						<label>Genero <span class="text-danger">*</span></label>
						<input type="text" name="genero" id="genero" class="form-control" value="<?php echo $row[0]['genero']; ?>" placeholder="Ingresa Genero" required>
						</div>

						<div class="form-group">

							<label>Fecha  de Nacimiento <span class="text-danger">*</span></label>

							<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" maxlength="10" class="form-control" value="<?php echo $row[0]['fecha_nacimiento']; ?>" placeholder="Ingrese fecha de nacimiento" required>

						</div>


						<div class="form-group">
							<label>Pais  <span class="text-danger">*</span></label>

							<select id="id_pais" name="id_pais" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  pais");	
									$pais = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($pais as $pro){ 
										if($pro->id_pais==$row[0]['id_pais'])					
											echo "<option  value='".$pro->id_pais."' selected>".$pro->nombre_pais."</option>";
										else
											echo "<option  value='".$pro->id_pais."' >".$pro->nombre_pais."</option>";
																	} ?>
							</select>						

						</div>
						
						<div class="form-group">
							<label>Provincia  <span class="text-danger">*</span></label>

							<select id="id_provincia" name="id_provincia" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  provincia");	
									$provincia = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($provincia as $pro){ 
										if($pro->id_provincia==$row[0]['id_provincia'])					
											echo "<option  value='".$pro->id_provincia."' selected>".$pro->nombre_prov."</option>";
										else
											echo "<option  value='".$pro->id_provincia."' >".$pro->nombre_prov."</option>";
																	} ?>
							</select>						

						</div>
						
						<div class="form-group">
							<label> Canton <span class="text-danger">*</span></label>
							<select id="id_canton" name="id_canton" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  canton");	
									$canton = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($canton as $pro){ 
										if($pro->id_canton==$row[0]['id_canton'])					
											echo "<option  value='".$pro->id_canton."' selected>".$pro->nombre_cant."</option>";
										else
											echo "<option  value='".$pro->id_canton."' >".$pro->nombre_cant."</option>";
																	} ?>
							</select>						

						</div>
						
						<div class="form-group">
							<label>Ciudad  <span class="text-danger">*</span></label>

							<select id="id_ciudad" name="id_ciudad" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  ciudad ");	
									$ciudad = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($ciudad as $pro){ 
										if($pro->id_ciudad==$row[0]['id_ciudad'])					
											echo "<option  value='".$pro->id_ciudad."' selected>".$pro->nombre_ciud."</option>";
										else
											echo "<option  value='".$pro->id_ciudad."' >".$pro->nombre_ciud."</option>";
																	} ?>
							</select>						

						</div>
						<div class="form-group">
							<label>Telefono<span class="text-danger">*</span></label>
							<input type="int" name="telefono_es" id="telefono_es" class="form-control" value="<?php echo $row[0]['telefono_es']; ?>" placeholder="Ingresa telefono" required>
						</div>
						<div class="form-group">
							<label>Correo <span class="text-danger">*</span></label>
							<input type="text" name="correo_es" id="correo_es"  class="form-control" value="<?php echo $row[0]['correo_es']; ?>" placeholder="Ingresa Correo" required>
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
</html>