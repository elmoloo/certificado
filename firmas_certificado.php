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
		
		$userCount	=	$db->getQueryCount('firmas_certificado','id_firma_certificado');
		$data	=	array(
			            'id_firma_certificado'=>$id_firma_certificado,
						'nombre_fir'=>$nombre_fir,
						'apellido_fir'=>$apellido_fir,
						'cargo_fir'=>$cargo_fir,
						'titulo1'=>$titulo1,
						'titulo2'=>$titulo2,
						'titulo3'=>$titulo3,
						

						
						
					);
		$insert	=	$db->insert('firmas_certificado',$data);
		if($insert){
			header('location:curso.php?msg=ras');
			exit;
		}else{
			header('location:curso.php?msg=rna');
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
					<label for="id_curso">Escoge firma de beneficiario <span class="text-danger">*</span> </label>
							<?php 							
								$consulta = $pdo->query("SELECT * FROM  cuadro_firmas ");	
								$pais = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_firmas_certificado"name="id_firmas_certificado"class="form-control"require>
								<option value="">Seleccione una Firma  </option>
								<?php foreach ($pais as $pro){ ?>								
									<option  value="<?php echo $pro->id_firmas_certificado?>"><?php echo $pro->nombre_cur?></option>
								<?php } ?>
							</select>						

						</div>
						</div>
					<div class="form-group">

							<label>Nombre estudiante <span class="text-danger">*</span></label>

							<input type="text" name="nombre_fir" id="nombre_fir" class="form-control" placeholder="Ingresa nombre    " required>

						</div>
						<div class="form-group">

							<label>Apellido <span class="text-danger">*</span></label>

							<input type="text" name="apellido_fir" id="apellido_fir" class="form-control" placeholder="Ingresa apellido " required>

						</div>
						<div class="form-group">

							<label>Cargo  <span class="text-danger">*</span></label>

							<input type="text" name="cargo_fir" id="cargo_fir" class="form-control" placeholder="Ingresa cargo" required>

						</div>

						<div class="form-group">
						<label>Titulo 1 <span class="text-danger">*</span></label> <br>
						<input type="text" name="titulo1" id="titulo1" class="form-group" value="<?php echo $_REQUEST['editId']; ?>" >
						
						<div class="form-group">							
						
						<h1>Enviar un Archivo</h1>
						
							<div class="alinear">	
						<img class="archivo" src="<?php echo $val['titulo1'];?>" >
						<form method="POST" action="" enctype="multipart/form-data">
							<input type="file" id="file" name="titulo1" >
							<label for="file" > <i class="fas fa-images">&nbsp;&nbsp;</i>subir archivo</label>
							<button type="submit" name="subir" value="subir" id="subir" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Subir</button>
						</form>
						<?php
						if (isset($_POST['subir'])) {
							$ruta = "titulos";
							$fichero = $ruta.basename($_FILES['titulo1']['name']);
						
						
						}
						
							?>
						
						</div>
 
						<div class="form-group">
						<label>Titulo 2 <span class="text-danger">*</span></label><br>
						<input type="text" name="titulo2" id="titulo2" class="form-group" value="<?php echo $_REQUEST['editId']; ?>" >
						
						<div class="form-group">							
						
						<h1>Enviar un Archivo</h1>
						
						<div class="alinear">	
						<img class="archivo" src="<?php echo $val['titulo2'];?>" >
						<form method="POST" action="" enctype="multipart/form-data"><br>
							<input type="file" id="file" name="titulo2" >
							<label for="file" > <i class="fas fa-images">&nbsp;&nbsp;</i>subir archivo</label>
							<button type="submit" name="subir" value="subir" id="subir" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Subir</button>
						</form>
						<?php
						if (isset($_POST['subir'])) {
							$ruta = "titulos";
							$fichero = $ruta.basename($_FILES['titulo2']['name']);
						
						
						}
						
							?>
						
						<div class="form-check form-check-inline">
  
						<div class="form-group">
						<label>Titulo 3 <span class="text-danger">*</span></label><br>
						<input type="text" name="titulo3" id="titulo3" class="form-group" value="<?php echo $_REQUEST['editId']; ?>" >
						
						<div class="form-group">							
						
						<h1>Enviar un Archivo</h1>
						
						<div class="alinear">	
						<img class="archivo" src="<?php echo $val['titulo3'];?>" >
						<form method="POST" action="" enctype="multipart/form-data"><br>
							<input type="file" id="file" name="titulo3" >
							<label for="file" > <i class="fas fa-images">&nbsp;&nbsp;</i>subir archivo</label>
							<button type="submit" name="subir" value="subir" id="subir" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Subir</button>
						</form>
						<?php
						if (isset($_POST['subir'])) {
							$ruta = "titulos";
							$fichero = $ruta.basename($_FILES['titulo3']['name']);
						
						
						}
						
	$condition	=	'';
	if(isset($_REQUEST['id_firma_certificado']) and $_REQUEST['id_firma_certificado']!=""){
		$condition	.=	' AND id_firma_certificado LIKE "%'.$_REQUEST['id_firma_certificado'].'%" ';
	}
	
	if(isset($_REQUEST['nombre_fir']) and $_REQUEST['nombre_fir']!=""){
		$condition	.=	' AND nombre_fir LIKE "%'.$_REQUEST['nombre_fir'].'%" ';
	}
	if(isset($_REQUEST['apellido_fir']) and $_REQUEST['apellido_fir']!=""){
		$condition	.=	' AND apellido_fir LIKE "%'.$_REQUEST['apellido_fir'].'%" ';
	}
	if(isset($_REQUEST['cargo_fir']) and $_REQUEST['cargo_fir']!=""){
		$condition	.=	' AND cargo_fir LIKE "%'.$_REQUEST['cargo_fir'].'%" ';
	}
	if(isset($_REQUEST['nota']) and $_REQUEST['nota']!=""){
		$condition	.=	' AND nota LIKE "%'.$_REQUEST['nota'].'%" ';
	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';
	}
	if(isset($_REQUEST['titulo1']) and $_REQUEST['titulo1']!=""){
		$condition	.=	' AND titulo1 LIKE "%'.$_REQUEST['titulo1'].'%" ';
	}
	if(isset($_REQUEST['titulo2']) and $_REQUEST['titulo2']!=""){
		$condition	.=	' AND titulo2 LIKE "%'.$_REQUEST['titulo2'].'%" ';
	}
	if(isset($_REQUEST['titulo3']) and $_REQUEST['titulo3']!=""){
		$condition	.=	' AND titulo3 LIKE "%'.$_REQUEST['titulo3'].'%" ';
	}
	
	
	$userData	=	$db->getAllRecords('firmas_certificado','*',$condition,'ORDER BY id_firma_certificado  DESC');
?>	
<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
					
					    <th>Id</th>
						<th>Nombre</th>
                        <th>Apellido</th> 
						<th>Cargo</th>
						<th>Titulo 1</th>  
						<th>Titulo 2</th>
						<th>Titulo 3</th>
						  
						
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
