<?php
include('conexao.php');
$mensagem = '';
if(isset($_POST['usuario']) && isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        $mensagem = "Usuário não informado";
    } else if(strlen($_POST['senha']) == 0) {
        $mensagem = "Preencha sua senha";
    } else {

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: painel.php");
        } else {
            $mensagem = "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #efe6db;
        }
        .tela-login{
            background-color: rgba(0, 0, 0, 0.6);
            position:absolute;
            top:50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 60px;
            border-radius: 20px;
            color: whitesmoke;
        }

        input{
            padding: 16px;
            border: none;
            outline: none;
            font-size: 18px;
            border-radius: 12px;
        }
        button{
            background-color:#556B2F;
            border: none;
            outline: none;
            padding: 16px;
            width: 100%;
            border-radius: 12px;
            color: white;
            font-size: 20px;
        }
        button:hover{
            background-color:#5B7F2F;
            cursor: pointer;
            
        }
        .a{
            font-size: 40px;
        }


        .esqueci-senha {
            background-color: transparent;
            color: dodgerblue;
            font-size: 16px;
            padding: 8px;
            width: auto;
            margin-top: 15px;
            cursor: pointer;
            border: none;
            text-align: center;
            display: block;
        }
        .esqueci-senha:hover {
            color: deepskyblue;
            text-decoration: underline;
        }
        .cadastrar {
            background-color: transparent;
            color: dodgerblue;
            font-size: 16px;
            padding: 8px;
            width: auto;
            cursor: pointer;
            border: none;
            text-align: center;
            display: block;
        }
        .cadastrar:hover {
            color: deepskyblue;
            text-decoration: underline;
        }
        .mensagem-erro {
            color: lightpink;
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="tela-login">
        <h1>Login</h1>
        <?php if($mensagem != ''): ?>
            <p class="mensagem-erro"><?php echo $mensagem; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <br>
            <input type="text" name="usuario" placeholder="Usuário">
            <br><br>      
            <input type="password" name="senha" placeholder="Senha">
            <br><br>   
            <button class="button" type="submit">Entrar</button>
            <a href="alterarsenha.php" class="esqueci-senha">Alterar senha</a>
            <a href="cadastro.php" class="cadastrar">Ainda não possui uma conta?</a>
        </form>
    </div