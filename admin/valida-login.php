<?php
require_once('config.php');

// Adicionar variaveis de Sessão
session_start();

// Recuperar os dados passado pelo úsuario na tela de login.
if(isset($_POST['usuario']) and isset($_POST['senha'])){
	$usuario 	= $_POST['usuario'];
	$senha		= $_POST['senha'];

// Instancia a Classe Usuário para verificação de dados.
	$user = new Usuario();
	$resultado = $user->login($usuario, $senha);

	//var_dump($resultado);
	//echo $result['id'];
	//echo $resultado[0]['id'];
	//exit;

// Verifica se foi retornado algum dado, se o resultado for vazio o usuário volta para a tela de login.
	if(empty($resultado)){
		$_SESSION['loginErro'] = "Usuário e/ou senha incorreto.";
		header("Location: ../index.php");
	}else{
		$_SESSION['usuarioId'] = $resultado[0]['id'];
		$_SESSION['usuarioNome'] = $resultado[0]['nome'];
		$_SESSION['usuarioLogin'] = $resultado[0]['login'];
		$_SESSION['usuarioEmail'] = $resultado[0]['email'];
		$_SESSION['usuarioPerfil'] = $resultado[0]['nivel_acesso'];

		if($_SESSION['usuarioPerfil'] == 1){
			header("Location: admin.php");
		}else{
			header("Location: ../operacional/admin.php");
		}
	}

}


?>