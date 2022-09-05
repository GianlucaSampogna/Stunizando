<?php

include_once 'conexao.php';

            if (isset($_POST['btn-edit'])) :
                $id = mysqli_escape_string($conexao, $_POST['id']);
                $nome = mysqli_escape_string($conexao, $_POST['nome']);
                $sobrenome = mysqli_escape_string($conexao, $_POST['sobrenome']);
                $email = mysqli_escape_string($conexao, $_POST['email']);
                $celular = mysqli_escape_string($conexao, $_POST['celular']);

                $sql = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email='$email', celular='$celular' WHERE  id='$id'";



                if (mysqli_query($conexao, $sql)) {
                    header ("Location: secao_atualizar.php");
                } else {
                    echo $sql;
                    die(mysqli_connect_error());
                }
            endif;


            if (isset($_POST['btn-deletar'])) :
                $id = mysqli_escape_string($conexao, $_POST['id']);

                $sql = "DELETE FROM usuario WHERE  id=$id";

                if (mysqli_query($conexao, $sql)) {
                    include_once 'logout.php';
                } else {
                    echo $sql;
                }
            endif;
            ?>
