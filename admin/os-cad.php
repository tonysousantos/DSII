<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastro de Funcionário
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=14">Funcionários</a></li>
      <li class="active"><a href="admin.php?link=13">Cadastrar</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=20&acao=cadastrar" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="numero_os">Numero O.S</label>
              <input type="number" class="form-control" id="numero_os" name="numero_os" placeholder="Numero da O.S" autofocus="">
            </div>

            <div class="form-group">
              <label>Funcionário</label>
              <select name="id_funcionario_os" id="id_funcionario_os" class="form-control select2">
                <option>Selecione um Funcionário</option>
                <?php
                $funcionarios = FUNCIONARIO::getList();
                foreach ($funcionarios as $funcionario) {
                  ?>
                  <option value="<?php echo $funcionario['id_funcionario']; ?>">
                    <?php echo utf8_encode($funcionario['nome']); ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="id_status_os" id="id_status_os" class="form-control select2">
                <option>Selecione um Status</option>
                <?php
                $allstatus = STATUS::getList();
                foreach ($allstatus as $status) {
                  ?>
                  <option value="<?php echo $status['id']; ?>">
                    <?php echo utf8_encode($status['descricao']); ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="data_agendamento_os">Data Agendamento</label>
              <input type="date" class="form-control" id="data_agendamento_os" name="data_agendamento_os">
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->