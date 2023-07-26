<?php
 include_once('config.php');
include_once('navbar.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($aprobado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}
	else{
		
		$userCount	=	$db->getQueryCount('generador_certificado','id_generador_certificado');
		$data	=	array(
						'id_añadir'=>$id_añadir,
			            'id_generador_certificado'=>$id_generador_certificado,
						'id_estudiante'=>$id_estudiante,
						'id_curso'=>$id_curso,
						'id_institucion'=>$id_institucion,
						'id_coordinador'=>$id_coordinador,
						'id_facilitador'=>$id_facilitador,
						'id_rector'=>$id_rector,
						
						
						
					);
		$insert	=	$db->insert('generador_certificado',$data);
		if($insert){
			header('location:generador_certificado.php?msg=ras');
			exit;
		}else{
			header('location:generador_certificado.php?msg=rna');
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

		<h1><a href="#">Añadir datos de el Certificado </a></h1>

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

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añadir  </strong> <a href="../cuadro_firmas.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar Certificado</a></div>

			<div class="card-body">
			

				<div class="col-sm-6">

					<h5 class="card-title">Todos los campos con <span class="text-danger">*</span> son obligatorios !</h5>

					<form method="post">
					<div class="form-group">
					
					</div> 
					
						<div class="form-group">
						<label for="id_curso"> Seleccione una Institucion <span class="text-danger">*</span> </label>
                        <?php 							
								$consulta = $pdo->query("SELECT * FROM institucion  ");	
								$pais = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_institucion"name="id_institucion"class="form-control"require>
								<option value="">Seleccione una Institucion  </option>
								<?php foreach ($pais as $pro){ ?>								
									<option  value="<?php echo $pro->id_institucion?>"><?php echo $pro->nombre_inst?></option>
								<?php } ?>
							</select>
					<br>
					<br>
					<div class="form-group">

						<label > <span class="text-danger">*</span> Tipo de Certificado</label> <br> 
						<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipo_de_certificado" id="tipo_de_certificado" value="Aprobado">
  <label class="form-check-label" for="inlineRadio1">Aprobado</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipo_de_certificado" id="tipo_de_certificado" value="Asistido">
  <label class="form-check-label" for="inlineRadio2">Asistido</label>
</div>
<br>
<br>

<div class="form-group">

							<label>Nombre de Coordinador<span class="text-danger">*</span></label>
							<br>
							<form  action="" method="post" autocomplete="off">
							<input type="int" name="nombre_co" apellido="" id="nombre_co" class="form-control" placeholder="Nombre coordinador" required>
						
							</form>
						</div>
						<div class="form-group">


						</div>
						<div class="form-group">

<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Añadir Certificado</button>

</div>
					</form>

				</div>

			</div>

		</div>
		</div>
	</div>
	<?php
	$condition	=	'';
	if(isset($_REQUEST['id_generador']) and $_REQUEST['id_generador']!=""){
		$condition	.=	' AND id_generador LIKE "%'.$_REQUEST['id_generador'].'%" ';
	}
	
	if(isset($_REQUEST['id_estudiante']) and $_REQUEST['id_estudiante']!=""){
		$condition	.=	' AND id_estudiante LIKE "%'.$_REQUEST['id_estudiante'].'%" ';
	}
	if(isset($_REQUEST['id_curso']) and $_REQUEST['id_curso']!=""){
		$condition	.=	' AND id_curso LIKE "%'.$_REQUEST['id_curso'].'%" ';
	}
	if(isset($_REQUEST['id_institucion']) and $_REQUEST['id_institucion']!=""){
		$condition	.=	' AND id_institucion LIKE "%'.$_REQUEST['id_institucion'].'%" ';
	}
	
	
	
	$userData	=	$db->getAllRecords('estudiante_curso','*',$condition,'ORDER BY id_estudiante_curso  DESC');
?>	
<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
					
					    <th>Id</th>
						<th>Nombre</th>
                        <th>Curso</th> 
						<th>Institucion</th>
						
						  
						
						<th class="text-center">Accion</th>
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
					

						<td align="center">
							<a href="edit/edit-firmas_certificado.php?editId=<?php echo $val['id_firmas_certificado'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="delete/delete-firmas_certificado.php?delId=<?php echo $val['id_firmas_certificado'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="4" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		<!-- codigo boton impresion -->
<html>
<head>
    <title>Botón de Impresión</title>
    <style>
        .print-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   <center> <h1>Contenido de la página</h1> </center>
    
    <!-- Botón de Impresión -->
   <center> <button class="print-button" onclick="window.print()"> Imprimir </button> </center>
	
</html>

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
