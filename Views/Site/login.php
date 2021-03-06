<?php
	include ('../../librs/adodb5/adodb-pager.inc.php');
	include ('../../librs/adodb5/adodb.inc.php');
	
	include	('../../Models/modelsConexion.php');
	include	('../../Models/modelsModelo.php');
	include	('../../Models/modelsMail.php');
	
	include	('../../Models/modelsUsuario.php');
	include	('../../Controllers/controlUsuario.php');
	
	
	$login = new controllerUsuario();
	
	if(isset($_POST['userRecover']) && 
	isset($_POST['mailRecover'])){
		  $login->recoverPassword($_POST);
	}
	if(isset($_POST['user']) && 
	isset($_POST['password'])){
		  $login->login($_POST);
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Infinish_QMS</title>
		
		<!-- Etiqueta para servidores -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		
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
		<div class="container text-center">
			<img class="mb-4" src="../images/logo png.png" alt="" width="50%" height="50%">
			<form class="form text-center log_form" method = "POST" role="form">
		  
			  <h1 class="h3 mb-3 font-weight-normal">Login</h1>
			  
			  <?php 
				if ($login->muestra_errores) {
				  foreach ($login->errores as $key => $value) {
					  echo '<div class="alert alert-danger centro_50">';
					echo $value."</div>";
				  }
				}
			  ?>
			  
			  <label for="inputUser" class="sr-only">User</label>
			  <input type="" id="inputUser" class="form-control centro_50" placeholder="User" name="user" required autofocus>
			  <label for="inputPassword" class="sr-only">Password</label>
			  <input type="password" id="inputPassword" class="form-control centro_50" placeholder="Password" name="password" required>
			  <!--
			  <div class="checkbox mb-3">
				<label>
				  <input type="checkbox" value="remember-me"> Remember me
				</label>
			  </div>
			  -->
			  <button class="btn btn-lg btn-primary btn-block btn-log_form" type="submit">Sign in</button>
			  
			  <p class="mt-5 mb-3"> <a href="" class="link-gray1" data-toggle="modal" data-target="#reqPasModal">Request new password</a></p>
			  <!--<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>-->
			</form>
		</div>
		<!-- Logout Modal-->
		<div class="modal fade" id="reqPasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Request new password</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			  </div>
			  <div class="modal-body">
				<p>
					A temporary password will be sent to registered mail, please enter with the new password</br></br></br>
				</p>
				<form class="form-signin" method = "POST" role="form">
				  
				  <?php 
					if ($login->muestra_errores_reset) {
					  foreach ($login->errores as $key => $value) {
						  echo '<div class="alert alert-danger centro_50">';
						echo $value."</div>";
					  }
					}
				  ?>
				  
				  <p>
				  <label for="inputUserRecover" class="sr-only">User</label>
				  <input type="" id="inputUserRecover" class="form-control centro_50" placeholder="User" name="userRecover" required autofocus>
				  <label for="inputMailRecover" class="sr-only">Email</label>
				  <input type="mail" id="inputMailRecover" class="form-control centro_50" placeholder="Mail" name="mailRecover" required>
				  </p>
				  <!--
				  <div class="checkbox mb-3">
					<label>
					  <input type="checkbox" value="remember-me"> Remember me
					</label>
				  </div>
				  -->
				  <button class="btn btn-lg btn-primary btn-block btn-log_form" type="submit">Send</button>
				  <p class="mt-5 mb-3"> 
				  </p>
				</form>
			  </div>
			  <!--
			  <div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary btn-log_form" href="logout.php">Send</a>
			  </div>
			  -->
			</div>
		  </div>
		</div>
	
<?php
	include ("footer.php");
?>