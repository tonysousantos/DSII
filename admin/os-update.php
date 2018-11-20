<?php
//session_start();
require_once ('seguranca.php');  

require_once('../dao/config.php');

$id = $_GET['id'];
$cados = CADASTROOS::getOs($id);

foreach ($cados as $os) {

}

  ///var_dump($dados);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar O.S
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=18">O.S</a></li>
      <li class="active"><a href="admin.php?link=19&id=<?php echo $os["id_os"]; ?>">Editar</a></li>
    </ol>
  </section>


  
  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=20&acao=update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="numero_os">Numero O.S</label>
              <input type="numeric" class="form-control" id="numero_os" name="numero_os" placeholder="Digite o numero" value="<?php echo $os['numero_os']; ?> ">
            </div>

            <div class="form-group">
              <label>Funcionário</label>
              <select name="id_funcionario_os" id="id_funcionario_os" class="form-control select2">
                <option>Selecione um Funcionário</option>
                <?php
                $funcionarios = FUNCIONARIO::getAll();
                foreach ($funcionarios as $funcionario) {
                  $id_funcionario = $funcionario['id_funcionario'];
                  ?>
                  <option value="<?php echo $funcionario['id_funcionario']; ?>"
                    <?php if ($id_funcionario == $os['id_funcionario_os']) {echo "selected";} ?>
                    >
                    <?php echo utf8_encode($funcionario['nome']); ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Função</label>
              <select name="id_status_os" id="id_status_os" class="form-control select2">
                <option>Selecione um Status</option>
                <?php
                $allstatus = STATUS::getList();
                foreach ($allstatus as $status) {
                  $id_status = $status['id'];
                  ?>
                  <option value="<?php echo $status['id']; ?>"
                    <?php if ($id_status == $os['id_status_os']) {echo "selected";} ?>
                    >
                    <?php echo utf8_encode($status['descricao']); ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="data_agendamento_os">Numero O.S</label>
              <input type="date" class="form-control" id="data_agendamento_os" name="data_agendamento_os" value="<?php echo $os['data_agendamento_os']; ?>">
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" name="id_os" value="<?php echo $os['id_os']; ?>">
            <button type="submit" class="btn btn-success">Alterar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->