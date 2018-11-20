<?php
//session_start();
require_once ('seguranca.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			O.S Referente ao dia: <?php echo Date('d/m/Y'); ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="admin.php?link=18">O.S Dia <?php echo Date('d/m/Y'); ?></a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					
					<div class="box-header">
						<a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i> Pesquisar</a>
					</div>

					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Numero O.S</th>
									<th>Funcionário</th>
									<th>Status</th>
									<th>Data Agendamento</th>
									<th>Data Cadastro</th>
									<th>Data Modificação</th>
								</tr>
							</thead>
							<tbody>

								<?php
								require_once('../dao/config.php');

								$pesq = isset($_POST['pesq']) ? $_POST['pesq'] : "";

								$home = new Home();

								if($pesq != ""){
									$dados = $home->search($pesq);
								}else{
									$dados = $home->getList();
								}

								foreach ($dados as $linha) {
									?>
									
									<tr>
										<td><?php echo utf8_encode($linha['numero_os']); ?></td>
										<td><?php echo utf8_encode($linha['nome']); ?></td>
										<td><?php echo utf8_encode($linha['descricao']); ?></td>
										<td>
											<?php
											if (!empty($linha['data_agendamento_os'])) {
												echo (date('d/m/Y', strtotime($linha['data_agendamento_os'])));
											}
											?>
										</td>
										<td>
											<?php
											if (!empty($linha['data_cadastro_os'])) {
												echo (date('d/m/Y H:i:s', strtotime($linha['data_cadastro_os'])));
											}
											?>
										</td>
										<td>
											<?php
											if (!empty($linha['data_modify_os'])) {
												echo (date('d/m/Y H:i:s', strtotime($linha['data_modify_os'])));
											}
											?>
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
				<h5 class="modal-title" id="exampleModalLabel">Pequisa de O.S</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="admin.php?link=21" method="post">
					<div class="form-group">
						<label for="pesq" class="col-form-label">Dados de pesquisa:</label>
						<input type="text" class="form-control" id="pesq" name="pesq" placeholder="Numero o.s, Funcionário ou Status" value="<?php echo @$_POST["pesq"]; ?>" autofocus="">
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