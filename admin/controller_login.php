<?php 
	require_once('../include/usuario.php');
	require_once('../include/crud_usuario.php');
	require_once('../include/conexion.php');

	$usuario=$_REQUEST["usuario"];
	echo "Usuario:".$usuario."<br>";
	$clave=$_REQUEST["clave"];
	echo "Clave:".$clave."<br>";

	

	//inicio de sesion
	session_start();
	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definida cuando el usuario se loguea, ya que la envía en la petición
	if(isset($_REQUEST["accion"])){
		if($_REQUEST["accion"]=="CERRARCESION")
		{
			session_destroy();
			header('location:ingreso.php');
		}
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
		
		echo "<br>---> Usuario:".$_POST['usuario']." pass:".$_POST['clave']." Tipo:";		
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['clave']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base

		if( !isset(($usuario))){
			echo "<br>marianosam_certificado";
			echo "<br>1. ERROR, credenciales no validas<br>";
			echo "<a href='index.php'>Regresar</a>";
			return;
		}
		
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario			
				header('Location:index.php?id_usuario='.$usuario->getId()); //envia a la página que simula la cuenta
		}else{
			echo "<br>marianosam_certificado";
			echo "<br>2. ERROR, credenciales no validas<br>";
			echo "<a href='index.php'>Regresar</a>";
			return;	
		}
	}elseif(isset($_REQUEST['salir'])){ // cuando presiona el botòn salir
		header('Location: index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>