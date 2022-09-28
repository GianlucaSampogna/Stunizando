<?php

include_once 'conexao.php';

            if (isset($_POST['btn-edit'])) :
                $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
                $sobrenome = filter_var($_POST['sobrenome'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $celular = filter_var($_POST['celular'], FILTER_SANITIZE_STRING);

                $sql = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email='$email', celular='$celular' WHERE  id='$id'";



                if (pg_query($conexao, $sql)) {
                    header ("Location: secao_atualizar.php");
                } else {
                    echo $sql;
                    die(pg_connect_error());
                }
            endif;


            if (isset($_POST['btn-deletar'])) :
                $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

                $sql = "DELETE FROM usuario WHERE  id=$id";

                if (pg_query($conexao, $sql)) {
                    include_once 'logout.php';
                } else {
                    echo $sql;
                }
            endif;
            ?>
