<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nomeRegistro']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senhaRegistro']));

$sql = "select count(*) as total from usuarios where nome = '$nome'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['nome_existe'] = true;
    header('location: registroForm.php');
    exit;
}

$sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";

if($mysqli->query($sql) === TRUE) {
    $_SESSION['status_registro'] = true;
}

$mysqli->close();

header('location: registroForm.php');
exit;

?>