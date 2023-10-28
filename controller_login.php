<?php 
	require_once('include/usuario.php');
	require_once('include/crud_usuario.php');
	require_once('include/conexion.php');

	$usuario=$_REQUEST["usuario"];
	echo "Usuario:".$usuario."<br>";
	$clave=$_REQUEST["clave"];
	echo "Clave:".$clave."<br>";
	//$tipo=$_REQUEST["tipo"];
	//echo "Tipo:".$tipo."<br>";
	
	//inicio de sesion
	session_start();
	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definida cuando el usuario se loguea, ya que la envía en la petición
	
		if($_REQUEST["accion"]=="CERRARSESION")
		{
			session_destroy();
			echo"<br>";
			header('location:ingreso.php');
		}
	
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location:index.php');
		}else{
			header('Location: error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		
		//echo "<br>---> Usuario:".$_POST['usuario']." pass:".$_POST['pas']." Tipo:".$tipo;		
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['clave']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base

		if( !isset($usuario)){
			
			echo '
			<script>
			alert("El Nombre de Usuario o Contraseña son Incorrectos");
			
			history.go(-1);
			</script>
		';	
			echo "<a href='ingreso.php'>Regresar</a>";
			return;
		}
		
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']=$usuario;
			//if ($usuario->getTipo()=='ADMIN') {	 //si el usuario se encuentra, crea la sesión de usuario			
				header('Location:index.php?id_usuario='.$usuario->getId()); //envia a la página que simula la cuenta
		}else{
			echo "<br>MARIANO SAMANIEGO";
			echo"<br>";
			echo "<br> <b> ERROR </b>, credenciales no validas<br>";
			echo"<br>";
			echo "<a href='ingreso.php'>Regresar</a>";
			
			return;	
		}
	}elseif(isset($_REQUEST['salir'])){ // cuando presiona el boton salir
		header('Location:ingreso.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>