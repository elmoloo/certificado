<?php include_once('../config.php');
include_once('../navbar.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('ciudad','*',' AND id_ciudad="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nombre_ciud==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'nombre_ciud'=>$nombre_ciud,
					'id_canton'=>$id_canton,
					
					
					);
	$update	=	$db->update('ciudad',$data,array('id_ciudad'=>$editId));
	if($update){
		header('location: ../add/add-ciudad.php?msg=rus');
		exit;
	}else{
		header('location: ../add/add-ciudad.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edita tu Ciudad </title>
	
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
	
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
			</header>
		</div> <!--/.container-->
	</div>
	
	
   	<div class="container">
		<h1><a href="#">Edita Ciudad</a></h1>
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Editar Ciudad </strong> <a href="../estudiante.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar Estudiante</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Todos los campos con  <span class="text-danger">*</span> son obligatorios!</h5>
					<form method="post">
						<div class="form-group">
							<label>Nombre de la Ciudad <span class="text-danger">*</span></label>
							<input type="int" name="nombre_ciud" id="nombre_ciud" class="form-control" value="<?php echo $row[0]['nombre_ciud']; ?>" placeholder="Ingresa Nombre de la Ciudad" required>
						</div>
						<div class="form-group">
							<label>Canton <span class="text-danger">*</span></label>

							<select id="id_canton" name="id_canton" class="form-control">
								<?php 
									$consulta = $pdo->query("SELECT * FROM  canton");	
									$provincia = $consulta->fetchAll(PDO::FETCH_OBJ);	
									foreach ($provincia as $pro){ 
										if($pro->id_canton==$row[0]['id_canton'])					
											echo "<option  value='".$pro->id_canton."' selected>".$pro->nombre_cant."</option>";
										else
											echo "<option  value='".$pro->id_canton."' >".$pro->nombre_cant."</option>";
																	} ?>
							</select>						

						</div>
					
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Editar Ciudad</button>
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