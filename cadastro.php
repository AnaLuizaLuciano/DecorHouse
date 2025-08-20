<?php
$usuario = 'root';
$senha = '';
$database = 'testeaame';
$host = 'localhost';
$port = 3406;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        
        if (empty($nome) || empty($senha)) {
            echo "Todos os campos devem ser preenchidos";
        } else {
            
            // Inserir no banco de dados
            $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':usuario', $nome);
            $stmt->bindParam(':senha', $senha);

            $stmt->execute();
            echo "Cadastro finalizado com sucesso";
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
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
        <h1>Formulário de Cadastro</h1>
        <div class="formulario">
            <form action="" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </main>

    <footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>