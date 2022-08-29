<?php
//conexao com o banco de dados
include_once("conexao.php");

//Declaração de varíavel, que retorna 1=> checkbox marcado, 0=> Checkbox não marcado
if (isset($_POST["portugues"])) {
    $portugues = 1;
} else {
    $portugues = 0;
}

if (isset($_POST["matematica"])) {
    $matematica = 1;
} else {
    $matematica = 0;
}

if (isset($_POST["geografia"])) {
    $geografia = 1;
} else {
    $geografia = 0;
}

if (isset($_POST["historia"])) {
    $historia = 1;
} else {
    $historia = 0;
}

if (isset($_POST["quimica"])) {
    $quimica = 1;
} else {
    $quimica = 0;
}

if (isset($_POST["fisica"])) {
    $fisica = 1;
} else {
    $fisica = 0;
}

if (isset($_POST["biologia"])) {
    $biologia = 1;
} else {
    $biologia = 0;
}





//pega os dados no cadastro e os transforma em variáveis

$inicia_data = $_POST['dt_inicio_estudos'];
$data_prova = $_POST['dt_fim_estudos'];
$hrs_seg = $_POST['hrs_seg'];
$hrs_ter = $_POST['hrs_ter'];
$hrs_qua = $_POST['hrs_qua'];
$hrs_qui = $_POST['hrs_qui'];
$hrs_sex = $_POST['hrs_sex'];
$hrs_sab = $_POST['hrs_sab'];
$hrs_dom = $_POST['hrs_dom'];






//insere os dados na tabela do banco dee dados
$sql = "INSERT INTO meu_plano_estudo(inicio_data,data_prova,portugues,matematica,geografia,historia,quimica,fisica,biologia,hrs_seg,hrs_ter,hrs_qua,hrs_qui,hrs_sex,hrs_sab,hrs_dom) 
         VALUES('$inicia_data','$data_prova','$portugues','$matematica','$geografia','$historia','$quimica','$fisica','$biologia','$hrs_seg','$hrs_ter','$hrs_qua','$hrs_qui','$hrs_sex','$hrs_sab','$hrs_dom')";

if (mysqli_query($conexao, $sql)){
    header("location:materias.php");
}

mysqli_close($conexao);
?>


