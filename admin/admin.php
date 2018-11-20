<?php

session_start();
require_once ('seguranca.php');
require_once ('config.php');
?>

<?php

require('header.php');

$link = isset($_GET['link']) ? $_GET['link'] : 0;

$pag[0] = "os-lista-home.php";

//Usuário
$pag[1] = "usuario-cad.php";
$pag[2] = "usuario-lista.php";
$pag[3] = "op-usuario.php";
$pag[4] = "usuario-update.php";

//Função
$pag[5] = "funcao-cad.php";
$pag[6] = "funcao-lista.php";
$pag[7] = "funcao-update.php";
$pag[8] = "op-funcao.php";

//Status
$pag[9] = "status-cad.php";
$pag[10] = "status-lista.php";
$pag[11] = "status-update.php";
$pag[12] = "op-status.php";

//Funcionário
$pag[13] = "funcionario-cad.php";
$pag[14] = "funcionario-lista.php";
$pag[15] = "funcionario-update.php";
$pag[16] = "op-funcionario.php";

//O.S
$pag[17] = "os-cad.php";
$pag[18] = "os-lista.php";
$pag[19] = "os-update.php";
$pag[20] = "op-os.php";

//HOME
$pag[21] = "os-lista-home.php";
$pag[22] = "os-update-home.php";
$pag[23] = "op-home.php";

if (!empty($link)) {
    if (file_exists($pag[$link])) {
        include $pag[$link];
    } else {
        include 'os-lista-home.php';
    }
} else {
    include 'os-lista-home.php';
}

require('footer.php');
?>
