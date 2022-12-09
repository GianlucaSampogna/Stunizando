<?php
$host = 'kesavan.db.elephantsql.com';
$port = '5432';
$dbname ='msrybghu';
$user = 'msrybghu';
$password = 'QBDUr6ByJoKwhyRG4PiXqZH_hqveARmp';

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$conexao = pg_connect($connection_string);

?>

