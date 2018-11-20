<?php
//session_start();
require_once ('seguranca.php');  

require_once('../dao/config.php');

$id = $_GET['id'];
$dados = Funcionario::getUser($id);

foreach ($dados as $user) {

}

  ///var_dump($dados);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Funcionario
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=14">Funcionario</a></li>
      <li class="active"><a href="admin.php?link=15&id=<?php echo $user["id_funcionario"]; ?>">Editar</a></li>
    </ol>
  </section>


  
  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=16&acao=update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo utf8_encode($user['nome']); ?> ">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo utf8_encode($user['email']); ?> ">
            </div>
            <div class="form-group">
              <label for="cpf">Cpf</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf" value="<?php echo utf8_encode($user['cpf']); ?> ">
            </div>

            <div class="form-group">
              <label>Função</label>
              <select name="id_funcao" id="id_funcao" class="form-control select2">
                <option>Selecione uma função</option>
                <?php
                $dados = FUNCAO::getList();
                foreach ($dados as $linha) {
                  $id_funcao = $linha['funcao_id'];
                  ?>
                  <option value="<?php echo $linha['funcao_id']; ?>"
                    <?php if ($id_funcao == $user['id_funcao']) {echo "selected";} ?>
                    >
                    <?php echo utf8_encode($linha['funcao_descricao']); ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" name="id_funcionario" value="<?php echo $user['id_funcionario']; ?>">
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