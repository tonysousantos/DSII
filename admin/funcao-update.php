<?php
//session_start();
require_once ('seguranca.php');  

require_once('../dao/config.php');

$id = $_GET['id'];
$dados = Funcao::getFunc($id);

foreach ($dados as $func) {
  
}

	///var_dump($dados);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Função
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=6">Funções</a></li>
      <li class="active"><a href="admin.php?link=7&id=<?php echo $func["funcao_id"]; ?>">Editar</a></li>
    </ol>
  </section>


  
  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=8&acao=update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="funcao_descricao">Descrição</label>
              <input type="text" class="form-control" id="funcao_descricao" name="funcao_descricao" placeholder="Digite o nome da Função" value="<?php echo utf8_encode($func['funcao_descricao']); ?> ">
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" name="funcao_id" value="<?php echo $func['funcao_id']; ?>">
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