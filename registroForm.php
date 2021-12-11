<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registro">
        <h2 class="titulo">Faça seu Registro</h2>
        <form action="registro.php" method="POST" autocomplete="off">
            <div class="registro-inputs">
                <input type="text" name="nomeRegistro" placeholder="Nome"> <br>
                <input type="password" name="senhaRegistro" placeholder="Senha"> <br>
                <?php
                if($_SESSION["status_registro"]):
                ?>
                    <p>Registro conluído</p>
                <?php
                endif;
                unset($_SESSION['status_registro']);
                ?>
                
                <?php
                if($_SESSION['nome_existe']):
                ?>
                    <p>Nome já existe</p>
                <?php
                endif;
                unset($_SESSION['nome_existe'])
                ?>
            </div>
            <div class="registrar">
                <a href="index.php">Faça login</a>
                <input type="submit" name="registrar" value="Registrar">
            </div>
        </form>

    </div>
</body>
</html>