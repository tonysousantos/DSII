<?php
//session_start();
require_once ('seguranca.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php 
	require_once ('config.php');

	$user = new Funcionario();

	$acao = $_GET['acao'];

	if($acao == 'cadastrar'){
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$user = new Funcionario();
		$user->insert($dados);
		header("Location: admin.php?link=14");
	}

	if($acao == 'update'){
		$id_funcionario = $_POST['id_funcionario'];
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$user = new Funcionario();
		$user->update($dados);
		header("Location: admin.php?link=14");
	}

	if($acao == 'delete'){
		$id = $_GET['id'];
		$user = new Funcionario();
		$user->delete($id);
		header("Location: admin.php?link=14");
	}
	?>
</div>
