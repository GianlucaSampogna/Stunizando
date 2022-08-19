<?php
$host = 'localhost';
$usuario = 'root';
$senha ='usbw';
$dtbase = 'gdh';

/*
$conexao = mysqli_connect($host, $usuario, $senha, $dtbase);
*/
$con_string = "host=kesavan.db.elephantsql.com port=5432 dbname=msrybghu user=msrybghu password=QBDUr6ByJoKwhyRG4PiXqZH_hqveARmp";
$conexao = pg_connect($con_string);

echo $conexao;

if (!$conexao){
    die(mysqli_connect_error());
    echo 'Erro';
}


/*
$con_string = "host=kesavan.db.elephantsql.com port=5432 dbname=msrybghu user=msrybghu password=QBDUr6ByJoKwhyRG4PiXqZH_hqveARmp";
$bdcon4 = pg_connect($con_string);


postgres://msrybghu:QBDUr6ByJoKwhyRG4PiXqZH_hqveARmp@kesavan.db.elephantsql.com/msrybghu
*/