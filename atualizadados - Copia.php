<?php 
include_once ('conexao.php');

if (isset($_POST["novo_nome"])) {
    $portugues = 1;
} else {
    $portugues = 0;
}

if (isset($_POST["novo_numero"])) {
    $matematica = 1;
} else {
    $matematica = 0;
}

if (isset($_POST["novo_email"])) {
    $matematica = 1;
} else {
    $matematica = 0;
}

?>