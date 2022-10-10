<?php
include_once 'head.php';
include_once 'protect.php';

$id = $_SESSION['id'];

?>



<header>
    <nav class="navbar navbar-expand-md cor-fundo">
        <div class="container">

            <!--ícone home-->
            <div class="mr-4">
                <img class="tamanhoImg" src="img/logo.png">
            </div>

            <!--menu responsivo-->

            <!--criando e colapsando os links do menu-->
            <div class="collapse navbar-collapse" id="nav-principal" class="headerstunizado">
                <ul class="navbar-nav ml-auto font-weight-bold">
                    <li class="nav-item ">
                        <a href="pagina_adm.php" class="nav-link color">Pagina do adiministrador</a>
                    </li>
                    <li class="nav-item ">
                        <a href="logout.php" class="nav-link color">Sair</a>
                    </li>
                </ul>
            </div>

            <!--final desse container-->
        </div>

        <!--final da barra de navegação-->
    </nav>
</header>









<?php
$sql = "SELECT count(id) FROM usuario";
$result = pg_query($conexao, $sql);
$usuarios = pg_fetch_array($result);

$sql = "SELECT count(fk_usuario_id) FROM planejamento";
$result = pg_query($conexao, $sql);
$planejamentos_num = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=1 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_port = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=2 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_mat = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=3 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_geo = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=4 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_hist = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=5 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_qui = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=6 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_fisic = pg_fetch_array($result);

$sql = "SELECT count(fk_disciplinas_id) FROM plan_disc WHERE fk_disciplinas_id=7 AND fazer = 1;";
$result = pg_query($conexao, $sql);
$planejamentos_bio = pg_fetch_array($result);

$num = 1;
while (isset($sql)){
$sql = "SELECT (nome, sobrenome, celular) FROM usuario WHERE id = $num";
$result = pg_query($conexao, $sql);
$dados = array($result);
$num = $num + 1;
$sql = "";
}



?>


<div class=" margem_emcima">


    <div class="d-flex justify-content-center flex-wrap w-100" style="width: 30rem;">
        <h3 class="d-block w-100 text-center">INFORMAÇOES UTEIS</h3>



        <div class="mb-3  ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Total de usuários do sistema:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $usuarios['count'] - 1; ?>">
        </div>



        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Total de planejamentos:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_num['count']; ?>">
        </div>



        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamento com português:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_port['count']; ?>">
        </div>



        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com matemática:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_mat['count']; ?>">
        </div>



        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com geografia:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_geo['count']; ?>">
        </div>


        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com história:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_hist['count']; ?>">
        </div>


        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com quimica:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_qui['count']; ?>">
        </div>



        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com física:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_fisic['count']; ?>">
        </div>


        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Planejamentos com biologia:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $planejamentos_bio['count']; ?>">
        </div>


        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Lista de todos os números de celular:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados; ?>">
        </div>

    </div>
</div>

<?php
include_once 'final.php';
?>