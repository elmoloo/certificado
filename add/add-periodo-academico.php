<?php 
	require_once('../cusuario.php');
	

 if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nombre_periac==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('periodo_academico','id_periodoac');
		//if($userCount[0]['total']){
			$data	=	array(
							'nombre_periac'=>$nombre_periac,
						);
			$insert	=	$db->insert('periodo_academico',$data);
			if($insert){
				header('location:../add/add-periodo-academico.php?msg=ras');
				exit;
			}else{
				header('location:../add/add-periodo-academico.php?msg=rna');
				exit;
			}
		//}else{
		//	header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
		//	exit;
		}
	}


?>


<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Periodos académicos</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">

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

		


		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añadir periodo</strong> </div>

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

					<h5 class="card-title">Los campos con <span class="text-danger">*</span> son obligatorios!</h5>

					<form method="post">

						<div class="form-group">

							<label>Nombre del Periodo academico<span class="text-danger">*</span></label>

							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="nombre_periac" id="nombre_periac" class="form-control" placeholder="Ingrese el Nombre del Perido Academico" required>

					<br>
	

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Añadir periodo</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

	<?php
	$condition	=	'';
	if(isset($_REQUEST['nombre_periac']) and $_REQUEST['nombre_periac']!=""){
		$condition	.=	' AND nombre_periac LIKE "%'.$_REQUEST['nombre_periac'].'%" ';
	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('periodo_academico','*',$condition,'ORDER BY id_periodoac');
?>	
<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
						<th>ID</th>
						<th>Periodo Academico</th>
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
						<td><?php echo $val['id_periodoac'];?></td>
						<td><?php echo $val['nombre_periac'];?></td>
						<td align="center">
							<a href="../edit/edit-periodoac.php?editId=<?php echo $val['id_periodoac'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="../delete/delete-periodoac.php?delId=<?php echo $val['id_periodoac'];?>" class="text-danger" onClick="return confirm('Esta seguro que desea eliminar este periodo');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
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
		
	</div>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<!--<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
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
	</script>-->

    

</body>
<footer>
<?php include_once('../footer.php');	?>
</footer>
</html> 