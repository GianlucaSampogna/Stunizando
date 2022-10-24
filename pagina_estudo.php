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

$nome_planejamento = $linha['nome']; //AQUI RETORNA O NOME DO PLANEJAMENTO

$date1 = date_create($dt_inicio);
$date2 = date_create($dt_final);
$diff = date_diff($date1, $date2); //AQUI RETORNA A DIFERENÇA, EM DIAS DA DATA QUE A PESSOA COLOCOU QUE IRIA COMEÇAR O PROJETO, PARA O DIA QUE IRÁ FINALIZAR
//echo $diff->format("%a");

$sql = "SELECT nome FROM disciplinas INNER JOIN plan_disc ON (plan_disc.fk_disciplinas_id = disciplinas.id) WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$materias = pg_fetch_all($result);


$sql = "SELECT dia_semana.nome, plan_dia.qtd_horas FROM dia_semana INNER JOIN plan_dia ON (dia_semana.id = plan_dia.fk_dia_semana_id) WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$linha = pg_fetch_all($result);
?>

<div id="calendar"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    height: 1000,
    events: 'eventos_calendario.php',
    initialDate: '2020-09-12',
  });

  calendar.render();
});
</script>



<section>
    <div>
        <h3> INFORMAÇOES DO PLANEJAMENTO</h3>
        <P>
            Nessa parte nós iremos criar um planejamento para você com base nos dias que o senhor informou, serão <strong><?php echo $diff->format("%a"); ?> dias de estudo.</strong><br><br>
            Você irá estudar as disciplinas de:
            <strong> <?php foreach ($materias as $coluna) {
                            print_r($coluna['nome']);
                            echo " ; ";
                        }   ?></strong>.<br><br>







            
            Estudando as seguintes matérias: 

            <?php  //AQUI PEGA TODAS AS MATÉRIAS QUE TEM O ID DA PESSOA
            $sql = "SELECT fk_disciplinas_id FROM plan_disc WHERE fazer =1 AND id_planejamento = $id_planejamento";
            $resultado = pg_query($conexao, $sql);
            $num_disc = pg_fetch_all($resultado);

            $ids_disc = (string)$num_disc[0]['fk_disciplinas_id'];
            for ($i = 1; $i < count($num_disc); $i++) {
                $ids_disc = $ids_disc . " OR  fk_disciplinas_id =" . (string)$num_disc[$i]['fk_disciplinas_id'];
                $ids_disc2 = $ids_disc . ", " . (string)$num_disc[$i]['fk_disciplinas_id'];
            }



            $sql = "SELECT * FROM conteudos WHERE fk_disciplinas_id = $ids_disc";
            $result = pg_query($conexao, $sql);
            $materias_totais = pg_fetch_all($result);
            echo "<br>";
            foreach ($materias_totais as $materias_total) {
                echo "<strong>" . $materias_total['nome'] . "</strong>" . " ; ";
            }
            ?>
            <br>


            <br>No qual será estudado as seguintes horas nos seguintes dias: <br>
            <?php
            $hrs_semana = 0;
            foreach ($linha as $coluna) {
                print_r($coluna['nome']);
                echo ": ";
                echo "<strong>";
                print_r($coluna['qtd_horas']);
                echo "</strong>";
                echo " hrs; <br>";
                $hrs_semana = $hrs_semana + $coluna['qtd_horas'];
            } ?>. <br>


        </P>
    </div>
</section>

<?php
$n_dias = (int) $diff->format("%a");
$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta feira', 'Quinta', 'Sexta', 'Sabado');
$diasemana_numero = date('w', strtotime($dt_inicio));
$dia_semana_inicial = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA EM QUE A PESSOA COMEÇOU A ESTUDAR
$diasemana_numero = date('w', strtotime($dt_final));
$dia_semana_final = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA FINAL
$horas_totais = (int)(($n_dias / 7) * $hrs_semana); // AQUI RETORNA A QUANTIDADE DE HORAS TOTAIS QUE ESSA PESSOA IRÁ ESTUDAR
$qtd_materias_pessoa = count($materias_totais); //AQUI RETORNA A QUANTIDADE DE MATÉRIAS QUE O USUÁRIO IRÁ ESTUDAR
$horas_por_materia = (int)($horas_totais / $qtd_materias_pessoa); //AQUI RETORNA A MÉDIA DE QUANTO A PESSOA IRÁ ESTUDAR POR MATÉRIA
for ($i=0; $i < count($materias_totais); $i++){
    $mat_pessoa[] = $materias_totais[$i]['nome'];
    $mat_pessoa['hora']= $horas_por_materia;
} //AQUI RETORNA UMA LISTA COM O NOME E A QTD DE HORAS QUE SERÁ ESTUDADA DESSA MATÉRIA
$i = 0;

echo $coluna[$dia_semana_inicial]['qtd_horas'];


while ($mat_pessoa[count($mat_pessoa)] != 0){
    while($mat_pessoa[$i]['hora'] != 0){
        if ($mat_pessoa[$i]['hora'] > $coluna[$dia_semana_inicial]['qtd_horas']){

        }
        
    }
}



    











?>




<?php
include_once 'final.php';
?>