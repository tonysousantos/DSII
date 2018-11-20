<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?link=0"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">


      <?php
      require_once('../dao/config.php');

      $dados = DASHBOARD::getList();

      foreach ($dados as $linha) {

        //var_dump($linha);
        //exit();
        ?>

        <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="_dist/img/user2-160x160.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h4 class="widget-user-username"><?php echo utf8_encode($linha['nome']); ?></h4>
              <h5 class="widget-user-desc"><?php echo utf8_encode($linha['funcao_descricao']); ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">O.S Pendentes <span class="pull-right badge bg-red">20</span></a></li>
                <li><a href="#">O.S Concluidas <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">O.S Canceladas <span class="pull-right badge bg-orange">5</span></a></li>
                <li><a href="#">Total de O.S <span class="pull-right badge bg-blue">31</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      <?php } ?>

      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->