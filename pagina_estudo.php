<?php
include_once 'head.php';
include_once 'header_cadastrado.php';
include_once 'protect.php';

$id_planejamento = $_POST['id'];
$sql = "SELECT * FROM planejamento WHERE id = '$id_planejamento'";
$result = pg_query($conexao, $sql);
$linha = pg_fetch_array($result);

$dt_inicio = $linha['dt_inicio']; //AQUI RETORNA A DATA QUE O USUÁRIO COLOCOU QUE IRIA COMEÇAR O PLANEJAMENTO
//$data_inicial = date('d/m/Y', strtotime($dt_inicio));

$dt_final = $linha['dt_fim']; //AQUI RETORNA A DATA QUE O USÁRIO COLOCOU QUE IRIA FINALIZAR O PROJETO
//$data_final = date('d/m/Y', strtotime($dt_final));

$nome_planejamento = $linha['nome'];//AQUI RETORNA O NOME DO PLANEJAMENTO

$date1=date_create($dt_inicio);
$date2=date_create($dt_final);
$diff=date_diff($date1,$date2); //AQUI RETORNA A DIFERENÇA, EM DIAS DA DATA QUE A PESSOA COLOCOU QUE IRIA COMEÇAR O PROJETO, PARA O DIA QUE IRÁ FINALIZAR
// echo $diff->format("%a");

$sql= "SELECT fazer=1 FROM plan_disc WHERE id_planejamento = $id_planejamento"; 
$result =pg_query($conexao, $sql);
$linha = pg_fetch_array($result);
$materias = $linha //AQUI RETORNA AS MATÉRIAS QUE A PESSOA IRÁ ESTUDAR



$sql= "SELECT fk_dia_semana_id, qtd_hrs FROM plan_dia WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$linha = pg_fetch_array($result);
$dias_horas = $linha
?>

<section>
    <div>
        <h3> INFORMAÇOES DO PLANEJAMENTO</h3>
        <P>
            Nessa parte nós iremos criar um planejamento para você com base nos dias que o senhor informou, serão <?php echo $diff;?> dias até a prova.<br>Você irá estudar as disciplinas de:           No qual será estudado as seguintes horas nos seguintes dias: 
            
        </P>
    </div>
</section>

<?php
include_once 'final.php';
?>

