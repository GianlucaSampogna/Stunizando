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
//echo $diff->format("%a");

$sql= "SELECT nome FROM disciplinas INNER JOIN plan_disc ON (plan_disc.fk_disciplinas_id = disciplinas.id) WHERE id_planejamento = $id_planejamento"; 
$result =pg_query($conexao, $sql);
$materias = pg_fetch_all($result);


$sql= "SELECT fk_dia_semana_id, qtd_horas FROM plan_dia WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$linha = pg_fetch_array($result);
$dias_horas = $linha;
?>

<section>
    <div>
        <h3> INFORMAÇOES DO PLANEJAMENTO</h3>
        <P>
            Nessa parte nós iremos criar um planejamento para você com base nos dias que o senhor informou, serão <strong><?php echo $diff->format("%a");?> dias de estudo.</strong><br>
            Você irá estudar as disciplinas de:<strong> <?php foreach ($materias as $coluna){
                                                                        print_r ($coluna['nome']);
                                                                        echo ", ";
                                                                        
    }   ?></strong>.
            <br>No qual será estudado as seguintes horas nos seguintes dias: <?php   ?>
            
        </P>
    </div>
</section>

<?php
include_once 'final.php';
?>

