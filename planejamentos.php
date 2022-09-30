<?php
include_once 'head2.php';
include_once 'header_cadastrado.php';
include_once 'protect.php';
include_once 'conexao.php';
?>

<div class="container ">
    <div class="card text-center ">
    <div class="card-header">
        <h3>SEUS PLANEJAMENTOS</h3> 
    </div>
    </br></br></br>

    <?php 
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM planejamento WHERE fk_usuario_id = '$id'" ;
    $result = pg_query($conexao, $sql);
    $num = 1;
    if (pg_num_rows($result) > 0) {
        while ($linha = pg_fetch_array($result)) { ?>

            <div class="card-body">
            <h5 class="card-title"><?php echo $linha["nome"]?></h5>
            <p class="card-text">ESSE É O SEU <?php echo $num ?> PLANEJAMENTO</p>
            <a href="#" class="btn btn-primary">Ir ao planejamento</a>
            </div>
        
        
        <?php
        }
    }?>
</div>
<?php
include_once 'final.php';
?>