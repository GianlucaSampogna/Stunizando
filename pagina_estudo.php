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
$n_dias = (int) $diff->format("%a") + 1;
//echo "Numero de dias: " . $n_dias . "<br>";
$diasemana = array('Domingo', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
$diasemana_numero = date('w', strtotime($dt_inicio));
$dia_semana_atual = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA EM QUE A PESSOA COMEÇOU A ESTUDAR
$diasemana_numero = date('w', strtotime($dt_final));
$dia_semana_final = $diasemana[$diasemana_numero]; //AQUI RETORNA O DIA DA SEMANA FINAL
$horas_totais = ($n_dias / 7) * $hrs_semana; // AQUI RETORNA A QUANTIDADE DE HORAS TOTAIS QUE ESSA PESSOA IRÁ ESTUDAR
//echo "Numero de horas totais " . $horas_totais . "<br><br>";
$qtd_materias_pessoa = count($materias_totais); //AQUI RETORNA A QUANTIDADE DE MATÉRIAS QUE O USUÁRIO IRÁ ESTUDAR
//echo "Numero de matérias " . $qtd_materias_pessoa . "<br><br>";
$horas_por_materia =  $horas_totais / $qtd_materias_pessoa; //AQUI RETORNA A MÉDIA DE QUANTO A PESSOA IRÁ ESTUDAR POR MATÉRIA POR DIA
$materias_totais; //ARRAY DE ARRAY CONTENDOTODAS AS MATÉRIAS QUE A PESSOA IRÁ ESTUDAR (CONTENDO O nome, id e fk_disciplinas_id)


$cont_hrs = 0;
$i = 0;
$materia_atual = 0;
$horas_dia_seguinte = 0;
$dia = strtotime($dt_inicio);
//$eventos = array();
$eventos["calendarEvents"] = array();
$id_evento = 0;
$dia_da_atividade = date('Y-m-d', strtotime($dt_inicio));
$diasemana_numero = date('w', strtotime($dt_inicio));





// var_dump($horas_dia);
// echo "Horas por matéria: " . $horas_por_materia . "<br>";

 while($i < $n_dias){
     $num_hrs_dia = $horas_dia[$dia_semana_atual] - $horas_dia_seguinte;
    //  echo "<br><br>".  "Numero de hora do dia da semana em que está: " . $horas_dia[$dia_semana_atual] . "<br>" ."Numero de horas do dia(contando o desconto do dia passado): " . $num_hrs_dia . "<br>" ;

     if ($horas_dia[$dia_semana_atual] == 0){
        
        
    }else{
        $qtd_materias = $num_hrs_dia/$horas_por_materia;
        $qtd_materias_int = (int)($num_hrs_dia/$horas_por_materia);
        if ($qtd_materias > $qtd_materias_int){
           $qt_materias = (int)($num_hrs_dia/$horas_por_materia) + 1;
        }else{
           $qt_materias = (int)($qt_materias);
        }
   
        //echo "Quantidade de matérias do dia " . $qt_materias ;
        $horas_dia_seguinte = ($qt_materias*$horas_por_materia - $num_hrs_dia);
        $j =0;
        $horas_estudada_no_dia = 0;
        
        $nome_materias_dia = "";
        while ($j < $qt_materias AND $qt_materias > 0){ //TENHO Q ARRANGAR UMA MANEIRA DE PASSAR A HORA DO DIA QUANDO FOR 0 PARA O PROXIMO DIA e TRATAR CASOS QUE O SALDO DE HORAS É NEGATIVO
            $nome_materia = $materias_totais[$materia_atual]['nome'];
            //echo "<br>" . $nome_materia ;
            $horas_estudada_no_dia = $horas_estudada_no_dia + $horas_por_materia;
            $j = $j+1;

            $nome_materias_dia = $nome_materias_dia . "/" . $nome_materia;



            if($horas_estudada_no_dia < $num_hrs_dia){
                $materia_atual = $materia_atual +1;
            }

            $materia = array();
            $materia["id"] = $id_evento;
            //$materia["name"] = "DIA DE ESTUDO";
            $materia["date"] = $dia_da_atividade;
            //$materia["type"] = "event";
            $materia["description"] = $nome_materias_dia;
            array_push($eventos["calendarEvents"], $materia);
            $id_evento = $id_evento +1;
            $dia_da_atividade = date('Y-m-d', strtotime("+1 days",strtotime($dia_da_atividade)));
           
        }
        //var_dump($nome_materias_dia);

    }

     echo "<br>";
     $i = $i+1;
     $diasemana_numero = $diasemana_numero + 1;
     if ($diasemana_numero == 7){
         $diasemana_numero = 0;
     }
     $dia_semana_atual = $diasemana[$diasemana_numero];
 }

 
  
 //echo "<pre>"; print_r($eventos); echo "</pre>";
 $eventos = json_encode($eventos);
  //echo "<pre>"; print_r($eventos); echo "</pre>";

 

?>

<input type="hidden" id="evento" value="<?php echo urlencode($eventos); ?>">

<div id="calendar" name="calendar"></div>

        <link rel="stylesheet" type="text/css" href="css/evo-calendar.css"/>
        <link rel="stylesheet" type="text/css" href="css/evo-calendar.midnight-blue.css"/>

<?php
include_once 'final.php';
?>