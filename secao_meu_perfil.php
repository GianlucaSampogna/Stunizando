<?php 
include_once 'head.php';
include_once 'header_cadastrado.php'; ///Incluição do header 

session_start();
$id = $_SESSION['id'];
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado); 


    if($dados['nome'] == ""){
    $dados['nome'] = 'Pagina';
    }

    
?>

<div class=" margem_emcima">

    
    <div class="d-flex justify-content-center flex-wrap w-100"  style="width: 30rem;">
        <h3 class="d-block w-100 text-center">SUAS INFORMAÇOES</h3>
        <div class="mb-3  ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Nome:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados['nome']; ?>">
        </div>
        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Sobrenome:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados['sobrenome']; ?>">
        </div>
        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados['email']; ?>">
        </div>
        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Celular:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados['celular']; ?>">
        </div>
        <div class="mb-3 ml-5 w-50 d-block">
            <label for="exampleInputEmail1" class="form-label">Genero:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $dados['genero']; ?>">
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <a href="secao_atualizar.php">
        <button type="button" class="btn btn-primary btn-lg" >Desejo atualizar minhas informaçoes</button>
    </a>
</div>



<?php 

include_once 'final.php';
?>