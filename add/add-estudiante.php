<?php 
require_once('../cusuario.php');


if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($cedula_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($nombre_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($apellido_es==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('estudiante','id_estudiante');
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
		$insert	=	$db->insert('estudiante',$data);
		if($insert){
			header('location:../estudiante.php?msg=ras');
			exit;
		}else{
			header('location:../estudiante.php?msg=rna');
			exit;
		}
	}
}
?>

<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Agregar Estudiante</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<script>

	  (adsbygoogle = window.adsbygoogle || []).push({

		google_ad_client: "ca-pub-6724419004010752",

		enable_page_level_ads: true

	  });

	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>

	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());

	  gtag('config', 'UA-131906273-1');

	</script>

</head>



<body>
<?php include_once('navbar.php'); ?>
   	<div class="container">

		<h1><a href="#">Añadir Estudiante</a></h1>

		

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añade Estudiante</strong> <a href="../estudiante.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar</a></div>

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

				<div class="col-sm-6">

					<h5 class="card-title">Todos los campos con <span class="text-danger">*</span> son obligatorios !</h5>

					<form method="post">

						<div class="form-group">

							<label>Cedula<span class="text-danger">*</span></label>

							<input type="number" name="cedula_es" id="cedula_es" class="form-control" placeholder="Ingresa Cedula" required>

						</div>

						<div class="form-group">

							<label>Nombre <span class="text-danger">*</span></label>

							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="nombre_es" id="nombre_es" class="form-control" placeholder="Ingresa Nombre" required>

						</div>
						<div class="form-group">

							<label>Apellido<span class="text-danger">*</span></label>

							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="apellido_es" id="apellido_es" class="form-control" placeholder="Ingresa Apellido" required>
						</div>

						<div class="form-group">							
							<label for="id_pais">Especialidad <span class="text-danger">*</span></label>
							<?php 							
								$consulta_pais = $pdo->query("SELECT * FROM  especialidad");	
								$Especialidad = $consulta_pais->fetchAll(PDO::FETCH_OBJ);	
								
							?>
							<select id="id_especialidad" name="id_especialidad" class="form-control">
								<option value="0">Seleccione una Especialidad</option>
								<?php foreach ($Especialidad as $pai){ ?>								
									<option  value="<?php echo $pai->id_especialidad ?>"> <?php echo $pai->nombre?></option>
								<?php } ?>
							</select>
							</div>	
						
							<div class="form-group">							
							<label for="id_especialidad">Periodo Academico <span class="text-danger">*</span></label>
							<?php 							
								$consulta_pais = $pdo->query("SELECT * FROM  periodo_academico");	
								$Periodoac = $consulta_pais->fetchAll(PDO::FETCH_OBJ);	
								
							?>
							<select id="id_periodoac" name="id_periodoac" class="form-control">
								<option value="0">Seleccione un Periodo Academico</option>
								<?php foreach ($Periodoac as $pai){ ?>								
									<option  value="<?php echo $pai->id_periodoac ?>"> <?php echo $pai->nombre_periac?></option>
								<?php } ?>
							</select>
							</div>	
								
						<div class="form-group">
						<label for="genero">Genero:<span class="text-danger">*</span></label>
							<select id="genero" name="genero" class="form-control">
							<option value="0">Seleccione  genero</option>
 								 <option value="Hombre">Hombre</option>
 								 <option value="Mujer">Mujer</option>
							
							</select>

							</div>
							<div class="form-group">

							<label>Fecha de nacimiento<span class="text-danger">*</span></label>

							<input type="date"  name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required=""></input>
						</div>
<!-- combo box pais	-->
						<div class="form-group">							
							<label for="id_pais">País<span class="text-danger">*</span></label>
							<?php 							
								$consulta_pais = $pdo->query("SELECT * FROM  pais");	
								$Paises = $consulta_pais->fetchAll(PDO::FETCH_OBJ);	
								
							?>
							<select id="id_pais" name="id_pais" class="form-control">
								<option value="0">Seleccione un País</option>
								<?php foreach ($Paises as $pai){ ?>								
									<option  value="<?php echo $pai->id_pais ?>"> <?php echo $pai->nombre_pais?></option>
								<?php } ?>
							</select>
							</div>		
<!-- combo box provincia -->
						<div class="form-group">							
							<label for="id_provincia">Provincia<span class="text-danger">*</span></label>
							<?php 							
								$consulta = $pdo->query("SELECT * FROM  provincia");	
								$Provincias = $consulta->fetchAll(PDO::FETCH_OBJ);	
								
							?>
							<select id="id_provincia" name="id_provincia" class="form-control">
								<option value="0">Seleccione una provincia</option>
								<?php foreach ($Provincias as $esp){ ?>								
									<option  value="<?php echo $esp->id_provincia ?>"> <?php echo $esp->nombre_prov?></option>
								<?php } ?>
							</select>						

						</div>
									
<!-- combo box canton -->
						<div class="form-group">							
							<label for="id_canton">Cantón<span class="text-danger">*</span></label>
							<?php 							
								$consulta = $pdo->query("SELECT * FROM  canton");	
								$Cantones = $consulta->fetchAll(PDO::FETCH_OBJ);	
								
							?>
							<select id="id_canton" name="id_canton" class="form-control">
								<option value="0">Seleccione un canton</option>
								<?php foreach ($Cantones as $esp){ ?>								
									<option  value="<?php echo $esp->id_canton ?>"> <?php echo $esp->nombre_cant?></option>
								<?php } ?>
							</select>

							<br>	
							
					<div class="form-group">
						<label for="id_ciudad"> Ciudad <span class="text-danger">*</span> </label>
                        <?php 							
								$consulta00 = $pdo->query("SELECT * FROM ciudad  ");	
								$ciudad = $consulta00->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_ciudad"name="id_ciudad"class="form-control"require>
								<option value="">Seleccione una Ciudad </option>
								<?php foreach ($ciudad as $pro){ ?>								
									<option  value="<?php echo $pro->id_ciudad?>"><?php echo $pro->nombre_ciud?></option>
								<?php } ?>
							</select>
							</div>

						<div class="form-group">

							<label>Telefono <span class="text-danger">*</span></label>

							<input type="number" name="telefono_es" id="telefono_es"  class="form-control" placeholder="Ingresa telefono" required>

						</div>
						<div class="form-group">

							<label>Correo <span class="text-danger">*</span></label>

							<input type="email" name="correo_es" id="correo_es"  class="form-control" placeholder="Ingresa Correo" required>

						</div>


				
						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Añadir Estudiante</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    

	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle"

			 style="display:block"

			 data-ad-client="ca-pub-6724419004010752"

			 data-ad-slot="7706376079"

			 data-ad-format="auto"

			 data-full-width-responsive="true"></ins>

		<script>

		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>

	</div>

	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>

    

</body>

</html>
