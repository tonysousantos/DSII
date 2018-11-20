<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastro de Função
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="admin.php?link=6">Lista de Funções</a></li>
            <li class="active"><a href="admin.php?link=5">Cadastrar</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="admin.php?link=8&acao=cadastrar" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="funcao_descricao">Descrição</label>
                                <input type="text" class="form-control" id="nome" name="funcao_descricao" placeholder="Infome o nome da Funão." autofocus="">
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