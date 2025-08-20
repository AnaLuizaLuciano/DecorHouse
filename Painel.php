<?php
include('protect.php');
include('conexao.php');

// Verifica se existe um valor de pesquisa
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

// Modificar a consulta SQL conforme o valor da pesquisa
if ($pesquisa != '') {
    // Consulta SQL com filtro de pesquisa no nome do produto
    $sql_code = "SELECT * FROM produto WHERE nome_produto LIKE '%$pesquisa%'";
} else {
    // Consulta SQL sem filtro, pega todos os produtos
    $sql_code = "SELECT * FROM produto";
}

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
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

header {
    width: 100%;
    background-color: #556B2F;
    padding: 10px 0;
}

h1 {
    text-align: center;
    color: #556B2F;
    margin-top: 20px;
}

#nav {
    background-color: #556B2F;
    height: 70px;
    display: flex;
    align-items: center;
    padding: 0 15px;
}

#logo {
    width: 130px;
    max-height: 80px;
}

.nav-item {
    margin-left: 20px;
    color: #556B2F;
    background-color: #efe6db;
    border-radius: 5px;
    font-size: 18px;
}

.nav-item:hover {
    transform: scale(1.1);
    color: #556B2F;
}

#pesquisa input {
    width: 300px;
    font-size: 17px;
    padding: 5px;
    float: left;
}

#pesquisa button {
    padding: 5px 15px;  
    background-color: #efe6db;   
    color: black;
    margin-left: 8px;
}

.produtos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
    margin-left: 50px;
    margin-right: 50px;
    flex: 1;
}

.produto-card {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 200px;
    margin-bottom: 30px;
}

.produto-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}

.produto-card h3 {
    font-size: 18px;
    margin: 10px 0;
}

.produto-card p {
    font-size: 16px;
    color: #555;
}

.preco {
    font-size: 18px;
    color: #007BFF;
    margin-top: 10px;
}

.ver-produto {
    text-decoration: none;
    color: inherit;
    background-color: #556B2F;
    color: white;
    padding: 4px;
    border-radius: 3px;
}

footer {
    margin-top: auto;
    width: 100%;
    background-color: #556B2F;
    height: 70px;
    color: white;
    text-align: center;
    padding: 20px;
}

    </style>
</head>
<body>
    <header>
        <nav class="navbar" id="nav">
            <a href="painel.php"><img src="imagem/img_logo3.jpeg" alt="logo" id="logo"></a>
            <form class="form-inline" id="pesquisa" method="GET" action="">
                <input class="form-control mr-sm-2" type="search" name="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <ul class="nav justify-content-end">
                <li class="nav-item"><a href="sobrenos.php" class="nav-link">Sobre nós</a></li>
                <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Ver Carrinho</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Lista de Produtos</h1>
        <div class="produtos-container">
            <?php
            if ($sql_query->num_rows > 0) {
                while ($produto = $sql_query->fetch_assoc()) {
                    echo "<div class='produto-card'>";
                    // Exibindo a imagem do produto
                    $imagem = $produto['imagem_produto']; // Caminho da imagem
                    echo "<img src='$imagem' alt='Imagem do Produto' class='produto-imagem' />";
                    echo "<h3>" . htmlspecialchars($produto['nome_produto']) . "</h3>";
                    echo "<p>Preço: R$ " . number_format($produto['valor_venda'], 2, ',', '.') . "</p>";
                    echo "<a href='gerenciarproduto.php?id=" . $produto['id_produto'] . "' class='ver-produto'>Ver produto</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p id="rodape">&copy; 2025 Decorhouse.ltda. Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
