<?php

$hostname = 'localhost';
$bancoDeDados = 'login';
$usuario = 'root';
$senha = '';

$mysqli = new mysqli($hostname, $usuario, $senha, $bancoDeDados);

if($mysqli->connect_errno) {
    echo 'Falha ao conectar (' . $mysqli->connect_errno . ')';
}// else
//    echo 'Conectado';
?>