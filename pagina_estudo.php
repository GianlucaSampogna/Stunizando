<?php
include_once 'head.php';
include_once 'header_cadastrado.php';
include_once 'protect.php';

$id_planejamento = $_POST['id'];
$sql = "SELECT * FROM planejamento WHERE id = '$id_planejamento'";
$result = pg_query($conexao, $sql);
$planejamento = pg_fetch_array($result);

$dt_inicio = $planejamento['dt_inicio']; //AQUI RETORNA A DATA QUE O USUÁRIO COLOCOU QUE IRIA COMEÇAR O PLANEJAMENTO
//$data_inicial = date('d/m/Y', strtotime($dt_inicio));

$dt_final = $planejamento['dt_fim']; //AQUI RETORNA A DATA QUE O USÁRIO COLOCOU QUE IRIA FINALIZAR O PROJETO
//$data_final = date('d/m/Y', strtotime($dt_final));

$nome_planejamento = $planejamento['nome']; //AQUI RETORNA O NOME DO PLANEJAMENTO

$date1 = date_create($dt_inicio);
$date2 = date_create($dt_final);
$diff = date_diff($date1, $date2); //AQUI RETORNA A DIFERENÇA, EM DIAS DA DATA QUE A PESSOA COLOCOU QUE IRIA COMEÇAR O PROJETO, PARA O DIA QUE IRÁ FINALIZAR
//echo $diff->format("%a");

$sql = "SELECT nome FROM disciplinas INNER JOIN plan_disc ON (plan_disc.fk_disciplinas_id = disciplinas.id) WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$materias = pg_fetch_all($result);


$sql = "SELECT dia_semana.nome, plan_dia.qtd_horas FROM dia_semana INNER JOIN plan_dia ON (dia_semana.id = plan_dia.fk_dia_semana_id) WHERE id_planejamento = $id_planejamento";
$result = pg_query($conexao, $sql);
$qtd_hs_semana = pg_fetch_all($result);
$horas_dia = array();
foreach ($qtd_hs_semana as $dia) {
    $nome_semana = strtok($dia['nome'], " ");
    $horas_dia[$nome_semana] = $dia['qtd_horas'];
}



$hrs_semana = 0;
foreach ($qtd_hs_semana as $coluna) {
    $hrs_semana = $hrs_semana + $coluna['qtd_horas'];
}

$sql = "SELECT fk_disciplinas_id FROM plan_disc WHERE fazer =1 AND id_planejamento = $id_planejamento";
$resultado = pg_query($conexao, $sql);
$num_disc = pg_fetch_all($resultado);

$ids_disc = (string)$num_disc[0]['fk_disciplinas_id'];
for ($i = 1; $i < count($num_disc); $i++) {
    $ids_disc = $ids_disc . " OR  fk_disciplinas_id =" . (string)$num_disc[$i]['fk_disciplinas_id'];
}
// echo $ids_disc2;



$sql = "SELECT * FROM conteudos WHERE fk_disciplinas_id = $ids_disc";
$result = pg_query($conexao, $sql);
$materias_totais = pg_fetch_all($result);




//$horas_dia RECEBE COMO CHAVE O DIA DA SEMANA E RETORNA A QUANTIDADE DE HORAS DO DIA
//$linha -AQUI TEM O DIA DA SEMANA E A QTD DE HORAS
$n_dias = (int) $diff->format("%a");
$diasemana = array('Domingo', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
$diasemana_numero = date('w', strtotime($dt_inicio));
$dia_semana_atual = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA EM QUE A PESSOA COMEÇOU A ESTUDAR
$diasemana_numero = date('w', strtotime($dt_final));
$dia_semana_final = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA FINAL
$horas_totais = (int)(($n_dias / 7) * $hrs_semana); // AQUI RETORNA A QUANTIDADE DE HORAS TOTAIS QUE ESSA PESSOA IRÁ ESTUDAR
$qtd_materias_pessoa = count($materias_totais); //AQUI RETORNA A QUANTIDADE DE MATÉRIAS QUE O USUÁRIO IRÁ ESTUDAR
$horas_por_materia =  $horas_totais / $qtd_materias_pessoa; //AQUI RETORNA A MÉDIA DE QUANTO A PESSOA IRÁ ESTUDAR POR MATÉRIA POR DIA
$materias_totais; //ARRAY DE ARRAY CONTENDOTODAS AS MATÉRIAS QUE A PESSOA IRÁ ESTUDAR (CONTENDO O nome, id e fk_disciplinas_id)


$cont_hrs = 0;
$i = 1;
$materia_atual = 0;
$horas_dia_seguinte = 0;
$dia = strtotime($dt_inicio);

// while($i < $n_dias){
//     $num_hrs_dia = $horas_dia[$dia_semana_atual] - $horas_dia_seguinte;
//     $qt_materias = (int)($num_hrs_dia/$horas_por_materia) + 1;
//     $horas_dia_seguinte = ($qt_materias*$horas_por_materia - $num_hrs_dia);
//     $j =0;
//     //IPRIMIRA OS VALORES PARA VER SE TA CÉRTO AS CONTAS
//     echo $qt_materias;
//     echo "<br><br>";
//     //echo (date('w', $dia));
//     while ($j<$qt_materias){
//         $nome_materia = $materias_totais[$materia_atual]['nome'];
//         echo $nome_materia;
//         //GERAR ENTRADA NO CALENDÁRIO AQUI(nome da matéria + dia)
//         $j = $j+1;
//         $materia_atual = $materia_atual +1;

//     }
//     echo "<br>";
//     $dia = $dia + 86400;
//     $i = $i+1;
// }

// while ($i < $d_dias){

//     $dia . $i = if ($)
// }


//AQUI TO TENTANDO CAUCULAR A QTD DE MATÉRIAS QUE IRÁ SER ESTUDADA NO DIA, OS DIAS QUE SOBRAREM, IREI COLOCAR COMO REVISÃO


$qtd_mat_usadas = 0;

$diasemana_numero = date('w', strtotime($dt_inicio));


// $dia = "dia";

$dias_mes_totais = array();

var_dump($horas_dia);
echo "<br>" . "qtd de materias: " . count($materias_totais) . "<br>";
echo "qtd de materias usadas: " . $qtd_mat_usadas . "<br>" . "hora por materia: " . $horas_por_materia . "<br>";



 //  alterar esta coisinha aqui
while (count($materias_totais) > $qtd_mat_usadas) {
    echo "dia da semana numero: " . $diasemana_numero . "<br>" . "dia da semana atual: " . $dia_semana_atual . "<br>";
    echo "horas que irao ser estudada no dia: " . $horas_dia[$dia_semana_atual] . "<br>"  . "<br>" . $qtd_mat_usadas . "<br><br>";

    $hora_conteudo= 
    $qtd_dias_materia = $horas_dia[$dia_semana_atual]

    if ($horas_dia[$dia_semana_atual] == 0){
        $dias_mes_totais[] = 0;
    }elseif ($horas_dia[$dia_semana_atual] > $horas_por_materia){
        $mat_dia = (int)($horas_dia[$dia_semana_atual] / $horas_por_materia);
        $dias_mes_totais[] = $mat_dia;
        $qtd_mat_usadas = $qtd_mat_usadas + $mat_dia;
    }else {
        $mat_dia = (int)($horas_por_materia / $horas_dia[$dia_semana_atual]);
        $dias_mes_totais[] = $mat_dia; //não sei pq tá caindo todos aqui
        $qtd_mat_usadas = $qtd_mat_usadas + 1;
    }
    
    $diasemana_numero = $diasemana_numero + 1;
    if ($diasemana_numero == 7){
        $diasemana_numero = 0;
    }
    $dia_semana_atual = $diasemana[$diasemana_numero];
    

}


echo $horas_por_materia . "<br>";

var_dump($dias_mes_totais);
echo $n_dias;



?>


<div id="calendar"></div>


<?php
include_once 'final.php';
?>