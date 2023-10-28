<?php 
require_once('../cusuario.php');
require_once('../include/usuario.php');

/*session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location: ingreso.php');
}*/
	require_once("../db.php");





if (isset($_GET['id_especialidad'])) {
	$id_especialidad=$_REQUEST['id_especialidad'];
}else{$id_especialidad=0;}
 
if (isset($_GET['id_periodoac'])) {
	$id_periodoac=$_REQUEST['id_periodoac'];
	
}else{$id_periodoac=0;}


?>


<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Añadir listado</title>

	

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
<?php 
include_once('navbar.php');
	?>

	

   	<div class="container">

		

		
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Generar listado de estudiantes</strong> <a href="../estudiante.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar estudiante</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Los campos con <span class="text-danger">*</span> son obligatorios!</h5>
<!-------------------------------------------------------------- script comprobar ------------------------------------------------------->

<script language="Javascript" type="text/javascript">
			

			function valida(){ 
			   indice = document.getElementById("id_especialidad").selectedIndex;
			   if( indice == null || indice == 0 ) {
				   alert("ERROR, Debe elegir una especialidad");	
				   return false;
			   }

			   indice = document.getElementById("id_periodoac").selectedIndex;
			   if( indice == null || indice == 0 ) {
				   alert("Debe elegir un periodo");	
				   return false;
			   }
			   document.form.submit();
			   return true;
		  }
   </script>
<!-------------------------------------------------------------- script comprobar ------------------------------------------------------->

					<form name="datosecx" action="add-listado-estudiantes.php" method="GET">
	<div class="form-group">							
							<label for="especialidad">Especialidad <span class="text-danger">*</span></label>
							<?php 							
								$consulta1 = $pdo->query("SELECT * FROM  especialidad");	
								$especialidad = $consulta1->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
								
							?>
							
							<select id="id_especialidad" name="id_especialidad" class="form-control" required onChange="JavaScript:datosecx.submit();">
								<option value="0">Seleccione una especialidad</option>
								<?php foreach ($especialidad as $esp){ 
									if($id_especialidad==$esp->id_especialidad)
									{
										echo "<option  value=".$esp->id_especialidad." selected>".$esp->nombre."</option>";
									}	
									else
									{    echo "<option  value=".$esp->id_especialidad.">".$esp->nombre."</option>";}
									?>								
									
								<?php } ?>
							</select>						

						</div>
	<div class="form-group">							
							<label for="Periodo_academico">Periodo Academico</label>
							<?php 
														
								$consulta2 = $pdo->query("SELECT * FROM  periodo_academico");	
								$Periodoac = $consulta2->fetchAll(PDO::FETCH_OBJ);	
								// print_r($especialidades);
							?>
							<select id="id_periodoac" name="id_periodoac" class="form-control" required onChange="JavaScript:datosecx.submit();">
								<option value="0">Seleccione un periodo</option>
								<?php foreach ($Periodoac as $esp){ 
									if($esp->id_periodoac==$id_periodoac)
									{	echo "<option  value=".$esp->id_periodoac." selected>".$esp->nombre_periac."</option>";}
									else
									{	echo "<option  value=".$esp->id_periodoac." >".$esp->nombre_periac."</option>";}
								?>								
									
								<?php } ?>
							</select>						

						</div>


						</form>
	
						<form name="form" id="form"  method="get" action="ecxel_estudaintes.php">
						<div class="form-group">
							<input type="hidden" name="id_periodoac" id="id_periodoac" value="<?php echo $id_periodoac;?>">
							<input type="hidden" readonly name="id_especialidad" id="id_especialidad" value="<?php echo $id_especialidad;?>">
							<a href="#" onclick="JavaScript:valida();" class="btn btn-primary" > <i class="fas fa-file-excel"></i> Generar Excel</a>
						</div>

					</form>

				</div>

			</div>

		</div>

	

	

	</div>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
</body>
<footer>
<?php include_once('../footer.php');	?>
</footer>
</html> 