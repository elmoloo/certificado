<?php include_once('../config.php');
include_once('../navbar.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nombre_cur==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($contenido_cur==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($num_horas==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
		
	}else{
		
		$userCount	=	$db->getQueryCount('curso','id_curso');
		$data	=	array(
						'id_institucion '=>$id_institucion ,
						'id_coordinador '=>$id_coordinador ,
						'nombre_cur'=>$nombre_cur,
						'nombre_co'=>$nombre_co,
						'contenido_cur'=>$contenido_cur,
						'num_horas'=>$num_horas,
						'tipo_curso'=>$tipo_curso,
						'tipo_aprobacion'=>$tipo_aprobacion,
						'duracion_cur'=>$duracion_cur,
						'fecha_inicio'=>$fecha_inicio,
						'fecha_fin'=>$fecha_fin,
						'fecha_certificado'=>$fecha_certificado,
						'desc_institucional'=>$desc_institucional,


					);
		$insert	=	$db->insert('curso',$data);
		if($insert){
			header('location:../curso.php?msg=ras');
			exit;
		}else{
			header('location:../curso.php?msg=rna');
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

	<title>PHP CRUD in Bootstrap 4 with search functionality</title>

	

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

   	<div class="container">

		<h1><a href="#">Añadir Curso</a></h1>

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

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añade un nuevo curso</strong> <a href="../curso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar Curso</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Todos los campos con <span class="text-danger">*</span> son obligatorios !</h5>

					<form method="post">

					<div class="form-group">							
							<label for="id_institucion">Institucion <span class="text-danger">*</span> </label>
							<?php 							
								$consulta = $pdo->query("SELECT * FROM  institucion ");	
								$institucion = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_institucion"name="id_institucion"class="form-control"  required>
								<option value="">Seleccione una Institucion</option>
								<?php foreach ($institucion as $pro){ ?>								
									<option  value="<?php echo $pro->id_institucion?>"><?php echo $pro->nombre_inst?></option>
								<?php } ?>
							</select>						

						</div>

						<div class="form-group">

							<label>Nombre de el Curso<span class="text-danger">*</span></label>

							<input type="text" name="nombre_cur" id="nombre_cur" class="form-control" placeholder="Ingresa Nombre de el Curso" required>

						</div>

						<div class="form-group">

							<label>Contenido del Curso <span class="text-danger">*</span></label>

							<input type="text" name="contenido_cur" id="contenido_cur" class="form-control" placeholder="Ingresa  Contenido" required>

						</div>

						<div class="form-group">

							<label>Nombre de Coordinador<span class="text-danger">*</span></label>
							<br>
							<div> <a href="../add/add-coordinador.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Añadir Coordinador</a></div>
							<input type="int" name="nombre_co" id="nombre_co" class="form-control" placeholder="Nombre coordinador" required>
						</div>
						<div class="form-group">

							<label>Numero de Horas<span class="text-danger">*</span></label>

							<input type="int" name="num_horas" id="num_horas" class="form-control" placeholder="Ingresa numero de horas" required>

						</div>
						<div class="form-group">

							<label>Tipo de Curso <span class="text-danger">*</span></label>

							<input type="text" name="tipo_curso" id="tipo_curso"  class="form-control" placeholder="Tipo de curso" required>

						</div>
						<div class="form-group">

						<label > <span class="text-danger">*</span> Tipo de Certificado</label> <br> 
						<div class="form-check form-check-inline">
 					 <input class="form-check-input" type="radio" name="tipo_de_certificado" id="tipo_de_certificado" value="Aprobado">
 					 <label class="form-check-label" for="inlineRadio1">Aprobado</label>
					 </div>
					 <div class="form-check form-check-inline">
 					 <input class="form-check-input" type="radio" name="tipo_de_certificado" id="tipo_de_certificado" value="Asistido">
  					 <label class="form-check-label" for="inlineRadio2">Asistido</label>
					 </div><br>
						<br>
						</div>
						<div class="form-group">

							<label>Duracion de Curso <span class="text-danger">*</span></label>

							<input type="int" name="duracion_cur" id="duracion_cur" class="form-control" placeholder="Ingresa duracion de curso" required>

						</div>  
						<div class="form-group">

							<label>Fecha  de Inicio <span class="text-danger">*</span></label>

							<input type="date" name="fecha_inicio" id="fecha_inicio" maxlength="10" class="form-control" placeholder="Ingrese fecha inicio" required>

						</div>
						<div class="form-group">

							<label>Fecha  Final  <span class="text-danger">*</span></label>

							<input type="date" name="fecha_fin" id="fecha_fin" maxlength="10" class="form-control" placeholder="Ingrese fecha final" required>

						</div>
						<div class="form-group">

							<label>Fecha de Certificado  <span class="text-danger">*</span></label>

							<input type="date" name="fecha_certificado" id="fecha_certificado" maxlength="10" class="form-control" placeholder="Ingrese fecha de el certificado" required>

						</div>
						<div class="form-group">

							<label>Descripcion Institucional  <span class="text-danger">*</span></label>

							<input type="text" name="desc_institucional" id="desc_institucional" class="form-control" placeholder="Describe Institucion" required>

						</div>

				
						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Añadir Curso</button>

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
