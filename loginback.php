<?php 
include_once('conexao.php');
include_once('db_crud.php');
include_once('tabelas.php');

if (isset($_POST['email']) || isset($_POST['password'])) {
   $email = $_POST['email'];
   $senha = $_POST['password'];

    $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $usuario = new Usuario();

    $usuario->setEmail($email);
    $usuario->setSenha($senhacriptografada);
    $dados = $usuario->login();
    session_start();
    if ($dados) {
        print_r($dados);
        if (password_verify($senha, $dados['senha'])) {
            if (!isset($_SESSION)) {
                session_start();
            }
            
            $_SESSION['id'] = $dados['id'];

            if (isset($_SESSION['id'])) {

                header("Location: secao_meu_perfil.php");
            }
            
        } else {
            $_SESSION['erro'] = true;
            header("Location: login.php");
        }
    } else {
        $_SESSION['erro'] = true;
        header("Location: login.php");
    }
}

?>