<?php
//session_start();
require_once ('seguranca.php');  

require_once('../dao/config.php');

$id = $_GET['id'];
$dados = Status::getFunc($id);

foreach ($dados as $func) {
  
}

	///var_dump($dados);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar de Status O.S
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=10">Lista de Status</a></li>
      <li class="active"><a href="admin.php?link=11&id=<?php echo $func["id"]; ?>">Editar</a></li>
    </ol>
  </section>


  
  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=12&acao=update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descricao do Status" value="<?php echo utf8_encode($func['descricao']); ?> ">
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" name="id" value="<?php echo $func['id']; ?>">
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