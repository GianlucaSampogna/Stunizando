<?

include_once 'conexao.php';

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