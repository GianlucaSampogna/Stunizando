<?
 include_once 'head.php';
 include_once 'header_cadastrado.php';
 include_once 'protect.php';
?>
</br></br>
<form action="atualizadados.php" method="post">
    <div class="col-sm-6">
        <legend>Digite seu novo e-mail: </legend>
        <input type="text" name="novo_nome" class="form-control" placeholder="Nome">
    </div>
</br>
    <div class="col-sm-6">
        <legend>Digite seu novo e-mail: </legend>
        <input type="email" name="novo_email" class="form-control" placeholder="Email">
    </div>
</br>
    <div class="col-sm-6">
        <legend>Digite seu novo número: </legend>
        <input type="number" name="novo_numero" class="form-control"  placeholder="Número de celular">
    </div>
</br>

</form>