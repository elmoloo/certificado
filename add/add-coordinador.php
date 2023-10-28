<?php 
require_once('../cusuario.php');


//validacion de login

/*if ($_SESSION['usuario']->getTipo()=='ESTUDIANTE') {					
	echo "<br>No tienes permiso para acceder";
	echo "<br>Contacta con el administrador";
	header('Location: controller_login.php?accion=CERRARSESION');
	return;
}*/

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($cedula_co==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($nombre_co==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($apellido_co==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('coordinador','id_coordinador');
		$data	=	array(
						'cedula_co'=>$cedula_co,
						'nombre_co'=>$nombre_co,
						'apellido_co'=>$apellido_co,
						'imagen_co'=>$imagen_co,

						
						
						
						
					);
		$insert	=	$db->insert('coordinador',$data);
		if($insert){
			header('location:add-coordinador.php?msg=ras');
			exit;
		}else{
			header('location:add-coordinador.php?msg=rna');
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

	<title>Ficheros</title>

	

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
<?php include_once('navbar.php');?>
   	<div class="container">

		<h1><a href="#">Añadir Coordinador</a></h1>

		
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añade Coordinador</strong> </div>

		
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

							<input type="number" name="cedula_co" id="cedula_co" class="form-control" placeholder="Ingresa Cedula" required>

						</div>

						<div class="form-group">

							<label>Nombre <span class="text-danger">*</span></label>

							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="nombre_co" id="nombre_co" class="form-control" placeholder="Ingresa Nombre" required>

						</div>
						<div class="form-group">

							<label>Apellido<span class="text-danger">*</span></label>

							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="apellido_co" id="apellido_co" class="form-control" placeholder="Ingresa Apellido" required>

						</div>
					

				
						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"> </i> Añadir Coordinador</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    <?php
	$condition	=	'';
	if(isset($_REQUEST['cedula_co']) and $_REQUEST['cedula_co']!=""){
		$condition	.=	' AND cedula_co LIKE "%'.$_REQUEST['cedula_co'].'%" ';
	}
	if(isset($_REQUEST['nombre_co']) and $_REQUEST['nombre_co']!=""){
		$condition	.=	' AND nombre_co LIKE "%'.$_REQUEST['nombre_co'].'%" ';
	}
	if(isset($_REQUEST['apellido_co']) and $_REQUEST['apellido_co']!=""){
		$condition	.=	' AND apellido_co LIKE "%'.$_REQUEST['apellido_co'].'%" ';
	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('coordinador','*',$condition,'ORDER BY id_coordinador');
?>

	<div>
	<div class="container">
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
						<th>ID</th>
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Firma</th>

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
						<td><?php echo $s;?></td>
						<td><?php echo $val['cedula_co'];?></td>
						<td><?php echo $val['nombre_co'];?></td>
						<td><?php echo $val['apellido_co'];?></td>
						<td><?php echo $val['imagen_co'];?></td>
						<td align="center">

							<a href="../edit/edit-coordinador.php?editId=<?php echo $val['id_coordinador'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="../delete/delete-coordinador.php?delId=<?php echo $val['id_coordinador'];?>"  class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>| 
							<a href="../firma_co.php?id_coordinador=<?php echo $val['id_coordinador'];?>" class="text-primary"><i class="fas fa-cloud-upload-alt"></i> Subir foto</a> 

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
