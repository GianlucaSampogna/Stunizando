<?php
            if (isset($_POST['btn-edit'])) :
                $nome = mysqli_escape_string($conexao, $_POST['nome']);
                $sobrenome = mysqli_escape_string($conexao, $_POST['sobrenome']);
                $email = mysqli_escape_string($conexao, $_POST['email']);
                $celular = mysqli_escape_string($conexao, $_POST['celular']);

                $sql = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email='$email', celular='$celular' WHERE  id=$id";



                if (mysqli_query($conexao, $sql)) {
                    header ("Refresh: 0; url=http://localhost/secao_atualizar.php");
                } else {
                    echo $sql;
                    die(mysqli_connect_error());
                }
            endif;
