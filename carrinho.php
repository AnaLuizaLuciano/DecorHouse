<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Carrinho de Compras</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #efe6db;
        height: 100%; 
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        }

        #nav {
            background-color: #556B2F;
            height: 90px;
            width: 100%;
            margin-bottom: 20px;
        }

        #logo {
            width: 130px;
            margin-left: 15px;
            margin-top: 12px;
        }

        #tabela {
            margin: 30px auto;
            width: 90%;
            max-width: 1100px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: white;
        }

        #tabela th,
        #tabela td {
            padding: 15px;
            text-align: center;
        }

        #tabela th {
            background-color: #556B2F;
            color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;

        }

        #tabela td {
            background-color: #f4f4f4;
            border: 1px solid gray;
        }

        .btn-remover {
            color: white;
            background-color: red;
            text-decoration: none;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-remover:hover {
            background-color: #e53935;
        }

        .btn-voltar {
            color: white;
            background-color: #556B2F;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
        }

        .btn-voltar:hover {
            background-color: #4a6d2f;
        }

        h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        h4 {
            font-size: 1.5rem;
            margin-top: 30px;
            color: #333;
            border: 1px solid gray;
            background-color: white;
            padding: 5px;
            text-align: center;
            width: 20%;
            max-width: 500px;
            margin: 20px auto;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            #tabela {
                width: 100%;
            }
        }
        #rodape {
            position: absolute;
            bottom: 0;
            left: 0;
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
        <nav id="nav">
            <a href="painel.php"><img src="imagem/img_logo3.jpeg" alt="Logo" id="logo"></a>
        </nav>
    </header>

    <main>
        <?php
        session_start();
        include('Conexao.php');

        // Verificar se o carrinho está na sessão
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Adicionar produto ao carrinho
        if (isset($_GET['id'])) {
            $id_produto = $_GET['id'];

            // Recuperar as informações do produto
            $sql_query = $mysqli->query("SELECT * FROM produto WHERE id_produto = $id_produto");

            if ($sql_query->num_rows > 0) {
                $produto = $sql_query->fetch_assoc();

                echo "<h2 class='text-center'>" . $produto['nome_produto'] . "</h2>";
                echo "<p class='text-center'>Preço: R$ " . number_format($produto['valor_venda'], 2, ',', '.') . "</p>";
                echo "<p class='text-center'>Quantidade disponível: " . $produto['quantidade'] . "</p>";

                // Formulário para adicionar ao carrinho
                echo "<form method='POST' action='' id='formulario' class='text-center'>";
                echo "<label for='quantidade'>Quantidade:</label>";
                echo "<input type='number' id='quantidade' name='quantidade' min='1' max='" . $produto['quantidade'] . "' required>";
                echo "<input type='hidden' name='id_produto' value='" . $produto['id_produto'] . "'>";
                echo "<input type='submit' name='adicionar_carrinho' value='Adicionar ao Carrinho' class='btn btn-success'>";
                echo "</form>";

                // Verificar se o formulário de adicionar foi enviado
                if (isset($_POST['adicionar_carrinho'])) {
                    $quantidade = $_POST['quantidade'];
                    $id_produto = $_POST['id_produto'];

                    if (isset($_SESSION['carrinho'][$id_produto])) {
                        // Atualiza a quantidade do produto
                        $_SESSION['carrinho'][$id_produto]['quantidade'] += $quantidade;
                    } else {
                        // Adiciona o produto ao carrinho
                        $_SESSION['carrinho'][$id_produto] = [
                            'nome_produto' => $produto['nome_produto'],
                            'quantidade' => $quantidade,
                            'valor_venda' => $produto['valor_venda']
                        ];
                    }

                    echo "<p class='text-center'>Produto adicionado ao carrinho!</p>";
                }
            } else {
                echo "Produto não encontrado!";
            }
        }

        // Remover produto do carrinho
        if (isset($_GET['remover_id'])) {
            $id_produto = $_GET['remover_id'];

            if (isset($_SESSION['carrinho'][$id_produto])) {
                unset($_SESSION['carrinho'][$id_produto]);
                echo "<p class='text-center text-danger'>Produto removido do carrinho!</p>";
            }
        }

        // Exibir o carrinho
        if (!empty($_SESSION['carrinho'])) {
            echo "<h3>Carrinho de Compras</h3>";
            echo "<table class='table' id='tabela'>";
            echo "<thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                        <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>";

            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $item) {
                $subtotal = $item['quantidade'] * $item['valor_venda'];
                $total += $subtotal;

                echo "<tr>";
                echo "<td>" . $item['nome_produto'] . "</td>";
                echo "<td>" . $item['quantidade'] . "</td>";
                echo "<td>R$ " . number_format($item['valor_venda'], 2, ',', '.') . "</td>";
                echo "<td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>";
                echo "<td><a href='?remover_id=$id' class='btn-remover'>Remover</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";

            // Exibir o preço total
            echo "<h4>Total: R$ " . number_format($total, 2, ',', '.') . "</h4>";
        } else {
            echo "<p class='text-center'>Seu carrinho está vazio.</p>";
        }
        ?>

        <!-- Botão para voltar às compras -->
        <div class="text-center">
            <a href="painel.php" class="btn-voltar">Voltar às compras</a>
        </div>
    </main>

    <footer>
        <p id="rodape">&copy; 2025 Decorhouse.ltda. Todos os direitos reservados</p>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
