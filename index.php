<?php
include('conexao.php');

if(isset($_POST['nome']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        echo "Informe seu nome";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Informe sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios where nome = '$nome' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: home.php");
            
        } else {
            echo"Falha ao se conectar ! nome ou senha incorretos";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php

        if(!isset($_SESSION['login'])){
            include('login.html');
        } else{
            include('home.php');
        }

    ?>
</body>
</html>
