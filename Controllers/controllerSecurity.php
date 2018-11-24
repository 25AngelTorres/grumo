<?php 
/** Valida que se haya iniciado sesion
	Sesion iniciada 	- Continua y optiene la informacion de la variable $_session
	Sesión no iniciada	- Redirige a sitio de login
*/
	//Iniciamos o continuamos la session
	session_start();
	//Valida que exista la información de sesion
	if( !isset($_SESSION['usuario']))
	header('Location: login.php');
?>