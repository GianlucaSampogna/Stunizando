<?php
//conexao com o banco de dados
include_once("conexao.php");

//pega os dados no cadastro e os transforma em variáveis


$nome = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$email = $_POST['email'];
$celular = $_POST['number'];
$genero = $_POST['genero'];
$senha = $_POST['password'];

$emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);



//pega a senha no cadastro, |criptografa| e transforma em uma variável
$senha = password_hash($senha, PASSWORD_DEFAULT);

//insere os dados na tabela do banco dee dados
$sql = "INSERT INTO usuario(nome,sobrenome,email,celular,genero,senha) 
         VALUES('$nome','$sobrenome','$emailvalidate','$celular','$genero','$senha')";

$data = pg_query($conexao, $sql);


if (!$data) {
   header("Location: cadastro.php");
   echo 'Alguma informação está incorreta, tente novamente';
} else {
   header("Location: login.php");
}
