<?php

require_once 'conexao.php';
include_once 'db_crud.php';
include_once 'tabelas.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['btn-edit'])) :

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    $id = $_SESSION['id'];
    $update = new Usuario();

    $update->setNome($nome);
    $update->setSobrenome($sobrenome);
    $update->setEmail($email);
    $update->setCelular($celular);


    if($update->update($id)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../secao_atualizar.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../secao_atualizar.php');
	endif;
endif;	

if (isset($_POST['btn-deletar'])) :


    $id = $_SESSION['id'];
    $delete = new Usuario();


    if ($delete->delete($id)) {
        include 'logout.php';
    }
endif;

header('Location: ../secao_atualizar.php');