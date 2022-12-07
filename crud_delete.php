<?php
require_once 'conexao.php';
include_once 'db_crud.php';
include_once 'tabelas.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btn-deletar'])) :


    $id = $_SESSION['id'];
    $delete = new Usuario();


    if ($delete->delete($id)) {
        include 'logout.php';
    }
endif;