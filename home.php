<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Bem vindo à página, <?php echo $_SESSION['nome']; ?>.

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>