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

$emailvalidate = filter_var($email,FILTER_VALIDATE_EMAIL);



//pega a senha no cadastro, |criptografa| e transforma em uma variável
$senha = password_hash($senha, PASSWORD_DEFAULT);

//insere os dados na tabela do banco dee dados
$sql = "INSERT INTO usuario(nome,sobrenome,email,celular,genero,senha) 
         VALUES('$nome','$sobrenome','$emailvalidate','$celular','$genero','$senha')";    

   $data = pg_query($conexao, $sql);
   


   $login_check = pg_num_rows($data);


   /* TÁ DANDO UM ERRO NA LINHA 37, QUE NÃO ESTÁ DIFERENCIANDO SE A PESSOA SE CADASTROU OU NÃO, POREM ESTÁ FORMANDO O CÓDIGO SQL NO BANCO DE DADOS */
   if($login_check>0){
      header("Location: login.php");
      }else{
         header("Location: cadastro.php");
         echo 'Alguma informação está incorreta, tente novamente';

      }

