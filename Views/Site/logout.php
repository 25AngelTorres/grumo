<?php
	session_start();
	include ('../../librs/adodb5/adodb-pager.inc.php');
	include ('../../librs/adodb5/adodb.inc.php');
	include	('../../Models/modelsConexion.php');
	include	('../../Models/modelsModelo.php');
	include	('../../Models/modelsUsuario.php');

	include ('../../Controllers/controlUsuario.php');
	
	$login = new controllerUsuario();
	
	$login -> cerrarSesion();
	
	header("Location: login.php");	
?>
