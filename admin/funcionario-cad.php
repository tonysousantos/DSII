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
        <form role="form" action="admin.php?link=16&acao=cadastrar" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" autofocus="">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Digite o E-mail">
            </div>
            <div class="form-group">
              <label for="cpf">Cpf</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf">
            </div>
            
            <div class="form-group">
              <label>Função</label>
              <select name="id_funcao" id="id_funcao" class="form-control select2">
                <option>Selecione uma função</option>
                <?php
                $dados = FUNCAO::getList();
                foreach ($dados as $linha) {
                  ?>
                  <option value="<?php echo $linha['funcao_id']; ?>">
                    <?php echo utf8_encode($linha['funcao_descricao']); ?>
                  </option>
                <?php } ?>
              </select>
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