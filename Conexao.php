<?php
$usuario = 'root';
$senha = '';
$database = 'testeaame';
$host = 'localhost';
$port = 3406;

$mysqli = new mysqli($host, $usuario, $senha, $database, $port);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
 