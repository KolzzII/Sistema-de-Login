<?php
include('conexao.php');

if(isset($_POST['nome']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        $erroNome = "Informe seu nome";
    } else if(strlen($_POST['senha']) == 0) {
        $erroSenha = "Informe sua senha";
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
            $erroLogin = "Falha ao se conectar ! nome ou senha incorretos";
        }
        
    }
}
?>

<div class="login">
    <h2 class="titulo">Login</h2>
    
    <form action="" method="POST" autocomplete="off">
        <div class="login-inputs">
            <input type="text" name="nome" placeholder="Nome"> <br>
            <input type="password" name="senha" placeholder="Senha"> <br>
            <?php
                if(isset($erroNome)) {
                    echo "<p>$erroNome</p>";
                }
                if(isset($erroSenha)) {
                    echo "<p>$erroSenha</p>";
                }
                if(isset($erroLogin)) {
                    echo "<p>$erroLogin</p>";
                }
            ?>
        </div>
        <div class="login-entrar">
            <a href="registroForm.php">Criar conta</a>
            <input type="submit" name="entrar" value="Entrar">
        </div>
    </form>
</div>