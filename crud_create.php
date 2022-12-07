<?php
//conexao com o banco de dados
require_once 'conexao.php';
include_once 'db_crud.php';
include_once 'tabelas.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btn-cadastro'])) :

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $celular = $_POST['celular'];
    
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $celular = $_POST['celular'];
    
    $emailvalidado = filter_var($email, FILTER_VALIDATE_EMAIL);
    $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $usuario = new Usuario();

    $usuario->setNome($nome);
    $usuario->setSobrenome($sobrenome);
    $usuario->setEmail($emailvalidado);
    $usuario->setSenha($senhacriptografada);
    $usuario->setCelular($celular);

    $insertUser = $usuario->insert();



    if ($insertUser):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: login.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../secao_meu_perfil.php');
	endif;
endif;	

?>