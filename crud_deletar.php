<?php

include_once 'conexao.php';

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