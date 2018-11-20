<?php
//session_start();
require_once ('seguranca.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php
        require_once ('config.php');

        $user = new Status();

        $acao = $_GET['acao'];

        if ($acao == 'cadastrar') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $user = new Status();
            $user->insert($dados);
            header("Location: admin.php?link=10");
        }

        if ($acao == 'update') {
            $id = $_POST['id'];
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $user = new Status();
            $user->update($dados);
            header("Location: admin.php?link=10");
        }

        if ($acao == 'delete') {
            $id = $_GET['id'];
            $user = new Status();
            $user->delete($id);
            header("Location: admin.php?link=10");
        }
        ?>
    </div>
</main>