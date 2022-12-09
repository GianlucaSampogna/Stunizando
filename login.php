<?php
//conexao com o banco de dados
include_once('conexao.php');


if (isset($_POST['email']) || isset($_POST['password'])) {
    //pega a senha digitada no login
    $email = $_POST['email'];
    $senha = $_POST['password'];
    //se o email estiver vazio
    if (strlen($email) == 0) {
        echo "Preencha seu e-mail";
        //se a senha estiver vazia
    } else if (strlen($_POST['password']) == 0) {
        echo "Preencha sua senha";
    } else {

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
        $result = pg_query($conexao, $sql_code);
        $num_rows = pg_num_rows($result);



        if ($num_rows > 0) {

            $usuario = pg_fetch_array($result);

           // echo '<pre>';
            //print_r($usuario);
            //echo '</pre>'; exit;

            if (password_verify($senha, $usuario['senha'])) {
                session_start();
                $_SESSION['id'] = $usuario['id'];
                if ($usuario['id'] == 0) {
                    header("Location: pagina_adm.php");
                }else{
                    header("Location: materias.php");
                }
                
            }
        }
    }
}


include_once 'head.php';
?>

<div class="form">
    <!-- div do formulário-->
    <form action="login.php" method="POST">
        <div class="form-header">
            <div class="title">
                <!-- titulo principal( no caso o cadastro embaixo)-->
                <h1> Login </h1>
                <!--nome do titulo-->
            </div>
        </div>
        <div class="input-box">
            <label for="email">E-mail</label>
            <!--atrituto for faz tipo link emtre a label ao input.(email)-->
            <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
        </div>

        <div class="input-box">
            <label for="password">Senha</label>
            <!--atrituto for faz tipo link emtre a label ao input.( senha)-->
            <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
        </div>

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