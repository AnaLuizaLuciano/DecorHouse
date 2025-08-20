<?php
include('conexao.php');  

$conn = new PDO("mysql:host=$host;dbname=$database", $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $nova_senha = $_POST["nova_senha"];

    if (empty($nome) || empty($nova_senha)) {
        echo "Todos os campos devem ser preenchidos";
    } else {
        // Verificar se o usuário existe
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$nome]);

        if ($stmt->rowCount() > 0) {
            // Alterar a senha
            $stmt_update = $conn->prepare("UPDATE usuarios SET senha = ? WHERE usuario = ?");
            $stmt_update->execute([$nova_senha, $nome]);
            echo "Senha alterada com sucesso!";
        } else {
            echo "Usuário não encontrado!";
        }
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Formulário de Cadastro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #efe6db;
            height: 100%; 
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }



        h1 {
            text-align: center;
            color: #556B2F;
            margin-top: 20px;
        }


        .formulario {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 40px auto;
        }

        .formulario input[type="text"], .formulario input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .formulario input[type="submit"] {
            background-color: #556B2F;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }


    </style>
</head>
<body>
    <header>
    </header>

    <main>
        <h1>Alterar senha</h1>
        <div class="formulario">
            <form method="POST">
                <label for="nome">Nome de Usuário:</label>
                <input type="text" id="nome" name="nome" required>
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>
                <input type="submit" value="Alterar Senha">
            </form>
        </div>
    </main>

    <footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>