<?php

session_start();
require_once ('seguranca.php');
require_once ('config.php');
?>

<?php

require('header.php');

$link = isset($_GET['link']) ? $_GET['link'] : 0;

$pag[0] = "os-lista-home.php";

//HOME
$pag[21] = "os-lista-home.php";
//$pag[22] = "os-update-home.php";
//$pag[23] = "op-home.php";

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
