<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        

<style>
    body {
        background-color: #efe6db;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    #nav{
        background-color: #556B2F;
        height: 90px;
        width: 100%;
    }
    #logo{
        width: 130px;
        margin-left: 15px;
    }
    .titulo {
        text-align: center;
        font-size: 2rem;
        color: #333;
        margin-top: 20px;
    }

    p {
        font-size: 1.2rem;
        color: #555;
        text-align: center;
    }

    label {
        font-size: 1rem;
        color: #333;
        display: block;
        margin-bottom: 8px;
        text-align: center;
    }

    input[type="number"] {
        width: 20%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        display: block;
        margin-left: auto;
        margin-right: auto;
        font-size: 1rem;
    }

    .botao-adicionar {
        background-color: #556B2F;
        border-radius: 5px;
        padding: 12px ;
        color: white;
        text-decoration: none;
        text-align: center;
        width: 20%;
        font-size: 1rem;
        cursor: pointer;
        display: block;
        margin-left: auto;
        margin-right: auto;
        transition: background-color 0.3s ease;
    }

    .botao-adicionar:hover {
        background-color: #4e5b32;
    }

    #botao {
        background-color: #efe6db;
        border: 2px solid #556B2F;
        border-radius: 5px;
        text-decoration: none;
        color: black;
        margin-top: 20px;
        width: 13%;
        text-align: center;
        background-color: white;
    }

    #botao:hover {
        background-color: #4e5b32;
    }
    #img {
    width: 30%;
    object-fit: cover;
    border-radius: 8px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    margin-top: 30px;
}
.container{
    display: flex;
    gap: 10px;
    justify-content: center;  
    align-items: center;
}
#rodape{
    background-color: #556B2F;
    height: 70px;
    margin-top: 30px;
    color: white;
    text-align: center;
    padding: 20px;
}
    
</style>
    </head>

    <body>
        <header>
        <nav class="navbar " id="nav">
                <a href="painel.php"><img src="imagem/img_logo3.jpeg" alt="logo" id="logo"></a>  
        </nav>
        <?php session_start(); // Iniciar a sessão para armazenar o carrinho 
include('Conexao.php');  // Recuperar o ID do produto da URL
$id_produto = $_GET['id'];  // Recuperar as informações do produto
$sql_query = $mysqli->query("SELECT * FROM produto WHERE id_produto = $id_produto");  // Verificar se a consulta retornou dados

if ($sql_query->num_rows > 0) {
    $produto = $sql_query->fetch_assoc();

    // Exibir as informações do produto
    $imagem = $produto['imagem_produto'];
    echo "<h2 class='titulo'>" . $produto['nome_produto'] . "</h2>";
    echo "<img src='$imagem' alt='Imagem do Produto' id='img' class='produto-imagem' />";
    echo "<p>Preço: R$ " . number_format($produto['valor_venda'], 2, ',', '.') . "</p>";
    echo "<p>Quantidade disponível: " . $produto['quantidade'] . "</p>";

    // Formulário para adicionar ao carrinho
    echo "<form method='POST' action=''>";
    echo "<label for='quantidade'>Quantidade:</label>";
    echo "<input type='number' id='quantidade' name='quantidade' min='1' max='" . $produto['quantidade'] . "' required>";
    echo "<input type='hidden' name='id_produto' value='" . $produto['id_produto'] . "'>";
    echo "<input type='submit' name='adicionar_carrinho' value='Adicionar ao Carrinho' class='botao-adicionar'>";
    echo "</form>";

    // Verificar se o usuário enviou o formulário para adicionar ao carrinho
    if (isset($_POST['adicionar_carrinho'])) {
        $quantidade = $_POST['quantidade'];
        $id_produto = $_POST['id_produto'];

        // Adicionar o produto ao carrinho (usando a sessão)
        if (isset($_SESSION['carrinho'])) {
            $carrinho = $_SESSION['carrinho'];
        } else {
            $carrinho = [];
        }

        // Verificar se o produto já está no carrinho
        if (isset($carrinho[$id_produto])) {
            // Se o produto já estiver no carrinho, atualizar a quantidade
            $carrinho[$id_produto]['quantidade'] += $quantidade;
        } else {
            // Caso contrário, adicionar o produto ao carrinho
            $carrinho[$id_produto] = [
                'nome_produto' => $produto['nome_produto'],
                'quantidade' => $quantidade,
                'valor_venda' => $produto['valor_venda']
            ];
        }

        // Atualizar a sessão com o carrinho
        $_SESSION['carrinho'] = $carrinho;

        echo "<p>Produto adicionado ao carrinho!</p>";
    }

} else {
    echo "Produto não encontrado!";
}
?>

        </header>
        <main>
            <div class="container">
                <a href="carrinho.php" id="botao">Ver Carrinho</a><br><br>
                <a href="painel.php" id="botao">Voltar às compras</a>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
            <p id="rodape">&copy; 2025 Decorhouse.ltda. Todos os direitos reservados</p>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>




    


