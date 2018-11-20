<?php
	
	session_start();
	
	session_destroy();
	
	unset($_SESSION['usuarioId'],$_SESSION['usuarioNome'],$_SESSION['usuarioPerfil'],
	$_SESSION['usuarioLogin'],$_SESSION['usuarioEmail']);
	
	header("Location: index.php");

?>