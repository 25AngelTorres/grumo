<?php
//Vista Privada
	session_start();
	
	include ('../../librs/adodb5/adodb-pager.inc.php');
	include ('../../librs/adodb5/adodb.inc.php');
	
	include	('../../Models/modelsConexion.php');
	include	('../../Models/modelsModelo.php');
	
	include	('../../Models/modelsUsuario.php');
	include	('../../Controllers/controlUsuario.php');
	
	$login = new controllerUsuario();
	
	if(isset($_POST['newPassword']) && 
	isset($_POST['newPassword2'])){
		  $login->ActualizarPassword($_SESSION['id_usuario'],$_POST);
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
			<img class="mb-4" src="../images/logo png.png" alt="" width="10%" height="10%">	
			<form class="form text-center log_form" method = "POST" role="form">
				<h1 class="h3 mb-3 font-weight-normal">Please, Enter a new password</h1>
				<?php 
					if ($login->muestra_errores) {
					  foreach ($login->errores as $key => $value) {
						  echo '<div class="alert alert-danger centro_50">';
						echo $value."</div>";
					  }
					}
				?>
				<div class="form-group row">
					<label for="newPassword" class="sr-only">Password</label>
					<input type="Password" id="inputUserRecover" class="form-control " placeholder="New Password" name="newPassword" required autofocus>
					<label for="newPassword2" class="sr-only">Repet Password</label>
					<input type="password" id="inputMailRecover" class="form-control " placeholder="Repet Password" name="newPassword2" required>
				 </div>
				 <div class="form-group row">
				 <button class="btn btn-lg btn-primary btn-block btn-log_form" type="submit">Confirm</button>
				 </div>
			</form>
		</div>
<?php
	include ("footer.php");
?>