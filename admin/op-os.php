<?php
//session_start();
require_once ('seguranca.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php 
	require_once ('config.php');

	$user = new CadastroOs();

	$acao = $_GET['acao'];

	if($acao == 'cadastrar'){
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$user = new CadastroOs();
		$user->insert($dados);
		//var_dump($dados);
		//exit();
		header("Location: admin.php?link=18");
	}

	if($acao == 'update'){
		$id_funcionario = $_POST['id_os'];
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$user = new CadastroOs();
		$user->update($dados);
		header("Location: admin.php?link=18");
	}

	if($acao == 'delete'){
		$id = $_GET['id'];
		$user = new CadastroOs();
		$user->delete($id);
		header("Location: admin.php?link=18");
	}
	?>
</div>
