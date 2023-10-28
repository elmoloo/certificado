<?php
 require_once('cusuario.php');


if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	/*if($id_estudiante==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($id_curso==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($id_institucion==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}elseif($id_ciudad==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
		
	}else{*/
		$userCount	=	$db->getQueryCount('estudiante_curso','id_estudiante_curso');
		$data	=	array(
						
						'id_estudiante'=>$id_estudiante,
						'id_curso'=>$id_curso,
						'id_institucion'=>$id_institucion,
						'aprobado'=>$aprobado,						
						 
					);
		$insert	=	$db->insert('estudiante_curso',$data);
		if($insert){
			header("location:/mariano_certificado/estudiante_curso.php?msg=rus&editId=".$_REQUEST['editId']."&id_curso=".$_REQUEST['id_curso']."&id_coordinador=".$_REQUEST['id_coordinador']."&id_facilitador=".$_REQUEST['id_facilitador']."&id_rector=".$_REQUEST['id_rector']);
			exit;
		}else{
			header("location:/mariano_certificado/estudiante_curso.php?msg=rus&editId=".$_REQUEST['editId']."&id_curso=".$_REQUEST['id_curso']."&id_coordinador=".$_REQUEST['id_coordinador']."&id_facilitador=".$_REQUEST['id_facilitador']."&id_rector=".$_REQUEST['id_rector']);
			exit;
		}
	}

?>

<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Agregar Estudiante a Curso</title>

	

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
	<?php  include_once('navbar.php'); ?>

   	<div class="container">

		<h1><a href="#">Añadir estudiante a curso </a></h1>

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
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Añadir  </strong><a href="/mariano_certificado/curso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar a Curso</a> </div>

			<div class="card-body">
			

				<div class="col-sm-6">

					<h5 class="card-title">Todos los campos con <span class="text-danger">*</span> son obligatorios !</h5>

					<form method="post">
					<div class="form-group">
					<label for="id_estudiante">Selecciona Estudiante <span class="text-danger">*</span> </label>
							
		

							<?php 							
								$consulta = $pdo->query("SELECT * FROM  estudiante ");	
								$pais = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_estudiante"name="id_estudiante"class="form-control"required>
								<option value=""> Seleccione un Estudiante </option>
								<?php foreach ($pais as $pro){ ?>								
									<option  value="<?php echo $pro->id_estudiante?>"><?php echo $pro->nombre_es?>  <?php echo $pro->apellido_es?></option>
								<?php } ?>
							</select>						

						<br>
						<div class="form-group">
						<label for="id_institucion"> Seleccione una Institucion <span class="text-danger">*</span> </label>
                        <?php 							
								$consulta = $pdo->query("SELECT * FROM institucion  ");	
								$pais = $consulta->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_institucion"name="id_institucion"class="form-control"required>
								<option value="">Seleccione una Institucion  </option>
								<?php foreach ($pais as $pro){ ?>								
									<option  value="<?php echo $pro->id_institucion?>"><?php echo $pro->nombre_inst?></option>
								<?php } ?>
							</select>
							</div>
		
							<div class="form-group">
						<label for="aprobado">Seleccion de Aprobacion:<span class="text-danger">*</span></label>
							<select id="aprobado" name="aprobado" class="form-control">
							<option value="0">Seleccione </option>
 								 <option value="Proximamente">Proximamente</option>
 								 <option value="Pendiente">Pendiente</option>
							
							</select>

							</div>

							
<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Añadir a curso</button>

</div>
					</form>

				</div>

			</div>

		</div>
		</div>
	</div>
	<?php
	$condition	=	'';
	
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
<br>
<div class="container">
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-dark text-white">
					
					    <th>Id</th>
						<th>Nombre</th>
                        <th>Curso</th> 
						<th>Institucion</th>
						<th>Aprobado</th>
						
						<th class="text-center">PDF</th>
						
						  
						
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
					<td>
						<?php 
							
							$consulta_est=	'';
							$consulta_cun = $pdo->query("SELECT * FROM  estudiante where id_estudiante =".$val['id_estudiante']);	
							$estudiante = $consulta_cun->fetchAll(PDO::FETCH_OBJ);
							foreach ($estudiante as $est){
								echo $est->nombre_es; echo "\n"; echo $est->apellido_es;
							}
					
												
						?>
						</td>
						<td>
						<?php 
							
							$consulta_cur=	'';
							$consulta_cu = $pdo->query("SELECT * FROM  curso where id_curso =".$val['id_curso']);	
							$con = $consulta_cu->fetchAll(PDO::FETCH_OBJ);
							foreach ($con as $pro)			
											echo "<option  value='".$pro->id_curso."' selected>".$pro->nombre_cur."</option>";						
						?>
						</td>

						<td>
						<?php 
							
							$consulta_inst=	'';
							$consulta_ins = $pdo->query("SELECT * FROM  institucion where id_institucion =".$val['id_institucion']);	
							$instituto = $consulta_ins->fetchAll(PDO::FETCH_OBJ);
							foreach ($instituto as $insti){
								echo $insti->nombre_inst;
							}
					
												
						?>
						</td>
						<td><?php echo $val['aprobado'];?></td>
						
						<td align="center"><a onclick = "return confirm('¿El Estudiante aprobó el Curso?')" target="_blank"   href="certificado.php?id_estudiante=<?php echo $val['id_estudiante'];?> &id_curso=<?php echo $val['id_curso'];?> &id_estudiante_curso=<?php echo $val['id_estudiante_curso'];?>&id_coordinador=<?php echo $_REQUEST['id_coordinador'];?>&id_facilitador=<?php echo $_REQUEST['id_facilitador'];?>&id_rector=<?php echo $_REQUEST['id_rector'];?>" class="text-primary"><i class="fas fa-file-pdf" > </i>  Certificado PDF </a> </td>

						<td align="center">
							<a href="edit/edit-estudiante-curso.php?editId=<?php echo $val['id_estudiante_curso'];?>&id_curso=<?php echo $_REQUEST['id_curso'];?>&id_coordinador=<?php echo $_REQUEST['id_coordinador'];?>&id_facilitador=<?php echo $_REQUEST['id_facilitador'];?>&id_rector=<?php echo $_REQUEST['id_rector'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | <br>
							<a href="delete/delete-estudiante-curso.php?delId=<?php echo $val['id_estudiante_curso'];?>&id_curso=<?php echo $_REQUEST['id_curso'];?>&id_coordinador=<?php echo $_REQUEST['id_coordinador'];?>&id_facilitador=<?php echo $_REQUEST['id_facilitador'];?>&id_rector=<?php echo $_REQUEST['id_rector'];?> " class="text-danger" onClick="return confirm('Esta seguro que quiere eliminar este usuario?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	

    

</body>

</html>
