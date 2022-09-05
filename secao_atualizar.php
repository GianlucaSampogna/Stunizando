<?
include_once 'head.php';
include_once 'header_cadastrado.php';
include_once 'protect.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM usuario WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);


if ($dados['nome'] == "") {
    $dados['nome'] = 'Pagina';
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light"> Editar Cliente </h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome"> Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
                <label for="sobrenome"> Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
                <label for="email"> Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="celular" id="celular" value="<?php echo $dados['celular']; ?>">
                <label for="celular"> Celular</label>
            </div>

            <button type="submit" name="btn-edit" class="btn">Atualizar</button>
            <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>

            <!-- Modal Structure deletar -->
            <div id="modal<?php echo $dados['id']; ?>" class="modal">
                <div class="modal-content">
                    <h3>Atenção!</h3>
                    <p>Deseja excluir esse cliente?</p>
                </div>
                <div class="modal-footer">

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </form>

                </div>
            </div>

        </form>

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

            <!-- INCLUIR O NOSSO FOOTER!!!!!!!!!!! -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


            <script>
                M.AutoInit();
            </script>
            <?include_once 'final.php';?>







            <!-- Modal Structure deletar -->
				  <div id="modal<?php echo $dados['id'];?>" class="modal">
					<div class="modal-content">
					  <h3>Atenção!</h3>
					  <p>Deseja excluir esse cliente?</p>
					</div>
					<div class="modal-footer">
					  
					  <form action="28crud_delete.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
						<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
					  
					  </form>
					  
					</div>
				  </div>