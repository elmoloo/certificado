
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">
   <img src="/mariano_certificado/assets/images/itsms.png"  width="35" height="35" alt="">
   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/mariano_certificado/index.php"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-clipboard"></i> Malla curricular
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mariano_certificado/add/add-especialidad.php">Crear Especialidad</a>
          <a class="dropdown-item" href="/mariano_certificado/add/add-periodo-academico.php">Crear Periodo Academico</a>
          <a class="dropdown-item" href="/mariano_certificado/curso.php">Curso</a>
        </div> 
     
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-graduate"></i> Estudiante
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mariano_certificado/estudiante.php">Estudiante</a>
          <a class="dropdown-item" href="/mariano_certificado/add/add-listado-estudiantes.php">Asistencia</a>
        </div> 
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-book-open"></i> Ficheros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mariano_certificado/add/add-coordinador.php">Añadir Coordinador</a>
          <a class="dropdown-item" href="/mariano_certificado/add/add-facilitador.php">Añadir Facilitador</a>
          <a class="dropdown-item" href="/mariano_certificado/add/add-rector.php">Añadir Rector</a>
          

        </div> 
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-chalkboard-teacher"></i> Certificados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mariano_certificado/generador_certificado.php">Generar Certificado</a>
          <a class="dropdown-item" href="/mariano_certificado/add_ficheros.php">Subir Firma</a>

        </div> 
      </li>-->
      
       <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-map-marked-alt"></i> Ubicacion
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mariano_certificado/add/add-pais.php">Añadir nuevo Pais</a>
          <a class="dropdown-item" href="/mariano_certificado/add/add-provincia.php">Añadir nueva Provincia</a>
           <a class="dropdown-item" href="/mariano_certificado/add/add-canton.php">Añadir nuevo Canton</a>
           <a class="dropdown-item" href="/mariano_certificado/add/add-ciudad.php">Añadir nueva Ciudad</a>
        </div>
      </li>
    </ul>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
                  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span ></span><i class="fas fa-user"></i> &nbsp<?php echo $_SESSION['usuario']->getId();?> <span class="icon-ellipsis-vert">
                  </a>
              </li>
              <a onClick="return confirm('¿ Seguro que quiere cerrar sesión ?');" href="../controller_login.php?accion=CERRARSESION" class="btn btn-danger"><span class="icon-off"><i class="fas fa-sign-out-alt" ></i> Cerrar Sesión</span></a>
  </div>
</nav>