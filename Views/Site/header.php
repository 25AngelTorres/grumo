<?php
	include ('../../librs/adodb5/adodb-pager.inc.php');
	include ('../../librs/adodb5/adodb.inc.php');
	
	include	('../../Models/modelsConexion.php');
	include	('../../Models/modelsModelo.php');
	include	('../../Models/modelsProceso.php');
	include	('../../Models/modelsSubproceso.php');
	include	('../../Models/modelsDocumento.php');
	include	('../../Models/modelsPermiso_Documento.php');
	
	include ('../../Controllers/controlSidebar.php');
	
	$sidebar = new controlSidebar();
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Infinish_QMS</title>
		
		<!-- Etiqueta para servidores -->
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

		
		<!-- Descripcion de la página -->
        <meta name="description" content="Gestion de documentos para la calidad de Infinish Acabados Industriales" />
		
		<!-- Palabras clave de la página -->
        <meta name="keywords" content="SGC, Infinish, IAI, Sistema, Gestion, Documentación, Documentos" />
		
		<!-- Configuracion de robots de busqueda
			Indez, Follow
			
			Index, Follow 		– Permite la indexación y rastreo de la página y es el valor por defecto. Prescindir de la etiqueta meta robots es lo mismo que utilizarla con esta configuración.
			NoIndex, Follow 	– Evita la indexación pero permite el rastreo. Es la configuración ideal cuando no quieres que una página aparezca en los resultados del buscador.
			Index, NoFollow 	– Permite la indexación pero evita el rastreo.
			NoIndex, NoFollow 	– Evita la indexación y el rastreo.
			-->
		<meta name="robots" content="NoIndex, NoFollow" />
		
		<!-- Persona o entidad que ha creado el contenido -->
        <meta name="author" content="25AngelTorres@gmail.com" />
		
		<!-- Visualizacion en version movil
			width=device-width 	– El tamaño de la página debe ser como el del dispositivo en que se muestra.
			initial-scale=1.0 	– La página debe mostrarse inicialmente tan grande como permita la pantalla.
		-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Icono para barra de favoritos -->
        <link rel="shortcut icon" href="../images/favicon.png" />
		
        <!-- Hojas de Estilo -->
		<!-- Bootstrap core CSS-->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
		<!-- fonts a utilizar-->
		<link rel="stylesheet" type="text/css" href="../../librs/fontawesome-free/css/all.min.css" >
		
		<!-- Hoja de estilo personalizada -->
		<link rel="stylesheet" type="text/css" href="../css/style.css" >
		
        <!--[if lt IE 9]>
                <script src="js/html5.js"></script>
        <![endif]-->
	</head>
	
	<body>
	<nav class="navbar navbar-expand navbar-dark  static-top resalte1">

	  <a class="navbar-brand mr-1" href="home.php">iQMS</a>

	  <button class="btn btn-link btn-sm text-white order-1 order-sm-0 menu-sidebar" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
	  
	  <!-- Navbar Search -->
	  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		  <div class="input-group-append">
			<button class="btn btn-primary" type="button">
			  <i class="fas fa-search"></i>
			</button>
		  </div>
		</div>
	  </form>
	  
	  
	  

	  <!-- Navbar -->
	  <ul class="navbar-nav ml-auto ml-md-0">
	  
	  <!-- Notificacion 
		<li class="nav-item dropdown no-arrow mx-1">
		  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-bell fa-fw"></i>
			<span class="badge badge-danger">7+</span>
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</li>
		-->
		
		<!-- Notificacion de correo
		<li class="nav-item dropdown no-arrow mx-1">
		  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-envelope fa-fw"></i>
			<span class="badge badge-danger">7</span>
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</li>
		-->
		
		<!--**** Configurar usuario ****-->
		<li class="nav-item dropdown no-arrow">
		  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-user-circle fa-fw"></i>
		  </a>
		  <!-- Menú desplegable -->
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="formSettingsUser.php">Settings</a>
			<!-- Barra divisor -->
			<div class="dropdown-divider"></div>
			<!-- Página logout -->
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" >Logout</a>
		  </div>
		</li>
	  </ul>
	</nav>
	<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	<!-- Barra lateral -->
	<div id="wrapper" class="sidebar" >
		<ul class="sidebar navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href=" ">
            <i class="fas fa-layer-group"></i>
            <span>Manage Documentation</span>
          </a>
        </li>
		<?php echo $sidebar->get_dropdown(); ?>
        
		
		<!-- para próximos módulos
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
		-->
      </ul>
	
	