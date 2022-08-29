<?php 
include_once 'head.php';
include_once 'header_cadastrado.php';
include_once 'protect.php';
?>
<form  action="cadastracao_meuplanejamento.php" method="post">

<div class="container" >
    <div class="row">
        <div class="col-sm-8 ">
            
                <legend>Inicio dos estudos: </legend>
                <input type="date" name="dt_inicio_estudos" class="form-control" placeholder="Leave a comment here" id="data_inicio_estudos" value="dt_inicio_estudo">
            </br>
                <legend>Dia da prova: </legend>
                <input type="date" name="dt_fim_estudos" class="form-control" placeholder="Leave a comment here" id="dt_fim_estudos" value="dt_prova">
            </br></br></br>
            <div>
                <fieldset>
                    <legend>Matérias a serem estudadas: </legend>
        
                    <label for="portugues">PORTUGUÊS</label>
                    <input type="checkbox" name="portugues"  id="portugues" value="1" class="form-control">  
                    <br>

                    <label for="matematica">MATEMÁTICA</label>
                    <input type="checkbox" name="matematica"  id="matematica" value="1" class="form-control">
                    <br>

                    <label for="geografia">GEOGRAFIA</label>
                    <input type="checkbox" name="geografia" class="form-control" id="1" value="1">
                    <br>

                    <label for="historia">HISTÓRIA</label>
                    <input type="checkbox" name="historia" class="form-control" id="historia" value="1">
                    <br>

                    <label for="quimica">QUIMICA</label>
                    <input type="checkbox" name="quimica" class="form-control" id="quimica" value="1">
                    <br>

                    <label for="fisica">FÍSICA</label>
                    <input type="checkbox" name="fisica" class="form-control" id="fisica" value="1">
                    <br>

                    <label for="biologia">BIOLOGIA</label>
                    <input type="checkbox" name="biologia" class="form-control" id="biologia" value="1">
                    <br>
                </fieldset>
            </div>
            

            


        </div>
        <div class="col-sm-2">
            <legend>Horas de estudo a cada dia: </legend>
                <input type="number" name="hrs_seg" class="form-control" value="0" >
                <input type="number" name="hrs_ter" class="form-control"  value="0">
                <input type="number" name="hrs_qua" class="form-control"   value="0">
                <input type="number" name="hrs_qui" class="form-control"   value="0">
                <input type="number" name="hrs_sex" class="form-control"   value="0">
                <input type="number" name="hrs_sab" class="form-control"  value="0">
                <input type="number" name="hrs_dom" class="form-control"  value="0">

        </div>
    </div>
</div>

<div aling="center">
    <div class="col-sm-8" >
        <button name="botao_plano_estudo" class="btn btn-primary" type="submit">Enviar</button>
    </div>

</div>


</form>

<?php
require_once 'footer_cadastrado.php';
include_once 'final.php';
?>