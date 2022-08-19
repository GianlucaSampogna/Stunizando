<?php 
include_once 'head.php';
?>

<div class='body_do_miguel'> <!--inicio da div-->
    <div class="box_do_miguel"> <!-- class container dividindo a imagem do formulário-->
        <div class="form-image"> <!--div da imagem-->
        <img src="img/imagem_cadastro.png" alt="">
        </div>
        <div class="form"> <!-- div do formulário-->
            <form action="cadastracao.php" method="POST">
                <div class="form-header-cadastro">
                    <div class="title"> <!-- titulo principal( no caso o cadastro embaixo)-->
                        <h1>Cadastre-se</h1> <!--nome do titulo-->
                    </div>
                </div>

                <div class="input-group"> <!--classe onde tera todos os inputs dentro do cadastro-->
                <div class="lado">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label> <!--atrituto for faz tipo link emtre a label ao input.( Primeiro nome)-->
                        <input id="firstname" type="text" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label> <!--atrituto for faz tipo link emtre a label ao input.(sobrenome)-->
                        <input id="lastname" type="text" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>

                <div class="continue-button">
                    <button class="botao" type="submit">Enviar</button>
                    <br><br><br><p>Caso já tenha conta, faça o <a href="login.php">Login</a> </p>
                </div>
            </form>
        </div>
    </div>

    <?php 
    include_once 'final.php';
    ?>