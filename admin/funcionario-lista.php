<?php
//session_start();
require_once ('seguranca.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Lista de Funcionario
		</h1>
		<ol class="breadcrumb">
			<li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="admin.php?link=14">Lista de Funcionários</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					
					<div class="box-header">
						<a href="admin.php?link=13" class="btn btn-success"><i class="fa fa-user-plus"></i> Cadastrar Funcionários</a>
						<a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i> Pesquisar</a>
					</div>

					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nome</th>
									<th>E-mail</th>
									<th>Cpf</th>
									<th>Função</th>
									<th>Data Cadastro</th>
									<th>Data Modificação</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('../dao/config.php');

								$pesq = isset($_POST['pesq']) ? $_POST['pesq'] : "";

								if($pesq != ""){
									$dados = Funcionario::search($pesq);
								}else{
									$dados = FUNCIONARIO::getList();
								}

								foreach ($dados as $linha) {
									?>
									
									<tr>
										<td><?php echo utf8_encode($linha['nome']); ?></td>
										<td><?php echo utf8_encode($linha['email']); ?></td>
										<td><?php echo utf8_encode($linha['cpf']); ?></td>
										<td><?php echo utf8_encode($linha['funcao_descricao']); ?></td>
										<td>
											<?php
											if (!empty($linha['fun_data_cadastro'])) {
												echo (date('d/m/Y H:i:s', strtotime($linha['fun_data_cadastro'])));
											}
											?>
										</td>
										<td>
											<?php
											if (!empty($linha['fun_data_modify'])) {
												echo (date('d/m/Y H:i:s', strtotime($linha['fun_data_modify'])));
											}
											?>
										</td>
										<td>
											
											<a href="admin.php?link=15&id=<?php echo $linha["id_funcionario"]; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
											<a href="admin.php?link=16&acao=delete&id=<?php echo $linha["id_funcionario"]; ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
										</td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Inicio - Modal de Pesquisar usuarios -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pequisa de Funcionários</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="admin.php?link=14" method="post">
					<div class="form-group">
						<label for="pesq" class="col-form-label">Dados de pesquisa:</label>
						<input type="text" class="form-control" id="pesq" name="pesq" placeholder="Nome, cpf ou E-mail" value="<?php echo @$_POST["pesq"]; ?>" autofocus="">
					</div>
					<!--
					<div class="alert alert-danger" role="alert">
						Pequisar por: Nome, Login ou E-mail...
					</div>
				-->

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Pesquisar</button>
				</div>
			</form>
		</div>

	</div>
</div>
</div>
<!-- Fim - Modal de Pesquisar usuarios -->