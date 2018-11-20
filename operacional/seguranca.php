
<?php

ob_start();

if (($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioLogin'] == "") ||
	($_SESSION['usuarioEmail'] == "") || ($_SESSION['usuarioPerfil'] == "") ){

	//DESTRUINDO DADOS DA SESSÃO
	unset($_SESSION['usuarioId'],$_SESSION['usuarioNome'],$_SESSION['usuarioLogin'],
		$_SESSION['usuarioEmail'],$_SESSION['usuarioPerfil']);

	//MENSAGEM DE ERRO
$_SESSION['loginErro'] = "Área restrita para usuários cadastrados, faça login.";

	//MANDA USUÁRIO PARA TELA DE LOGIN
header("Location: ../index.php");

}

?>
