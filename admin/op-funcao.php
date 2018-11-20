<?php
//session_start();
require_once ('seguranca.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php
        require_once ('config.php');

        $user = new Funcao();

        $acao = $_GET['acao'];

        if ($acao == 'cadastrar') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $user = new Funcao();
            $user->insert($dados);
            header("Location: admin.php?link=6");
        }

        if ($acao == 'update') {
            $id = $_POST['funcao_id'];
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $user = new Funcao();
            $user->update($dados);
            header("Location: admin.php?link=6");
        }

        if ($acao == 'delete') {
            $id = $_GET['funcao_id'];
            $user = new Funcao();
            $user->delete($id);
            header("Location: admin.php?link=6");
        }
        ?>
    </div>
</main>