<?php
//session_start();
require_once ('seguranca.php');  

require_once('../dao/config.php');

$id = $_GET['id'];
$dados = Usuario::getUser($id);

foreach ($dados as $user) {
  
}

	///var_dump($dados);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Usuário
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="admin.php?link=2">Usuários</a></li>
      <li class="active"><a href="admin.php?link=4&id=<?php echo $user["id"]; ?>">Editar</a></li>
    </ol>
  </section>


  
  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="admin.php?link=3&acao=update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo utf8_encode($user['nome']); ?> ">
            </div>
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" value="<?php echo utf8_encode($user['login']); ?> ">
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" value="<?php echo utf8_encode($user['senha']); ?> ">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo utf8_encode($user['email']); ?> ">
            </div>
            
            <div class="checkbox">
              <label>
                <input type="checkbox" name="nivel_acesso" value="1" <?php if( $user['nivel_acesso'] == 1){echo "checked";} ?> > Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
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