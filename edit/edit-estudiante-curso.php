<?php 
require_once('../cusuario.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('estudiante_curso','*',' AND id_estudiante_curso="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($aprobado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'id_estudiante'=>$id_estudiante,
					//'id_curso'=>$id_curso,
					'id_institucion'=>$id_institucion,
					'aprobado'=>$aprobado,
					
					
					
					);
	$update	=	$db->update('estudiante_curso',$data,array('id_estudiante_curso'=>$editId));
	if($update){
		header("location:/mariano_certificado/estudiante_curso.php?msg=rus&editId=".$_REQUEST['editId']."&id_curso=".$_REQUEST['id_curso']."&id_coordinador=".$_REQUEST['id_coordinador']."&id_facilitador=".$_REQUEST['id_facilitador']."&id_rector=".$_REQUEST['id_rector']);
		exit;
	}else{
		header("location:/mariano_certificado/estudiante_curso.php?msg=rnu&editId=".$_REQUEST['editId']."&id_curso=".$_REQUEST['id_curso']."&id_coordinador=".$_REQUEST['id_coordinador']."&id_facilitador=".$_REQUEST['id_facilitador']."&id_rector=".$_REQUEST['id_rector']);
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edita  </title>
	
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
		<h1><a href="#">Editar</a></h1>
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Editar  </strong> <a href="/mariano_certificado/curso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Regresar a Curso</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Todos los campos con  <span class="text-danger">*</span> son obligatorios!</h5>
					<form method="post">
						<div class="form-group">
								
						<div class="form-group">
							<label>Selecione Estudiante <span class="text-danger">*</span></label>

							<select id="id_estudiante" name="id_estudiante" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  estudiante");	
									$estudiant = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($estudiant as $pro){ 
										if($pro->id_estudiante==$row[0]['id_estudiante'])					
											echo "<option  value='".$pro->id_estudiante."' selected>".$pro->nombre_es."\n".$pro->apellido_es."</option>";
										else
											echo "<option  value='".$pro->id_estudiante."' >".$pro->nombre_es."\n".$pro->apellido_es."</option>";
																	} ?>
							</select>						

						</div>

							
						<div class="form-group">
							<label>Seleccione Institucion<span class="text-danger">*</span></label>

							<select id="id_institucion" name="id_institucion" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  institucion");	
									$instituc = $consulta->fetchAll(PDO::FETCH_OBJ);	
									
									foreach ($instituc as $pro){ 
										if($pro->id_institucion==$row[0]['id_institucion'])					
											echo "<option  value='".$pro->id_institucion."' selected>".$pro->nombre_inst."</option>";
										else
											echo "<option  value='".$pro->id_institucion."' >".$pro->nombre_inst."</option>";
																	} ?>
							</select>						

						</div>


							<label>Seleccione Aprobacion <span class="text-danger">*</span></label>
							<input type="text" onkeydown="return /[a-zA-ZñÑá-úÁ-Ú, ]/i.test(event.key)" name="aprobado" id="aprobado" class="form-control" value="<?php echo $row[0]['aprobado']; ?>" placeholder="Selecione " required>
						</div>
					
					
						<div class="form-group">
							<input type="hidden" name="id_curso" id="id_curso" value="<?php echo $_REQUEST['id_curso']?>">
							<input type="hidden" name="id_rector" id="id_rector" value="<?php echo $_REQUEST['id_rector']?>">
							<input type="hidden" name="id_coordinador" id="id_coordinador" value="<?php echo $_REQUEST['id_coordinador']?>">
							<input type="hidden" name="id_facilitador" id="id_facilitador" value="<?php echo $_REQUEST['id_facilitador']?>">
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