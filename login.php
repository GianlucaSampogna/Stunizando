<?php
include_once 'head.php';
?>

        <div class="form"> <!-- div do formulário-->
            <form action="loginback.php" method="POST">
                <div class="form-header">
                    <div class="title"> <!-- titulo principal( no caso o cadastro embaixo)-->
                        <h1> Login </h1> <!--nome do titulo-->
                    </div>
                </div>
                    <div class="input-box">
                        <label for="email">E-mail</label> <!--atrituto for faz tipo link emtre a label ao input.(email)-->
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label> <!--atrituto for faz tipo link emtre a label ao input.( senha)-->
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <?php
                    session_start();
                    if(isset($_SESSION['erro'])) {
                    ?>
                        <div class="erro-login">
                            <span>Email ou senha errados, tente novamente</span>
                        </div>
                    <?php
                    }
                    session_unset();
                    ?>

                <div class="continue-button">
                    <button class="botao" type="submit">Enviar</button> 
                </div>
                <br>
                <p>Caso não tenha conta, faça seu <a href="cadastro.php">Cadastro</a> </p>
            </form>
        </div>
    </div>
<?php 
include_once "final.php";
?>