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
            
        body{
            background-color: #efe6db;
        }
        #nav {
            background-color: #556B2F;
            height: 90px;
            display: flex;
            align-items: center;
        }
        #logo{
            width: 130px;
            margin-left: 15px;
        }
        .nav-item {
            color: #556B2F;
            background-color: #efe6db;
            border-radius: 5px;
            font-size: 18px;
            margin-right: 20px;
        }

        .nav-item:hover {
            transform: scale(1.1);
            color: #556B2F;
        }
        h3{
            text-align: center;
            color: #556B2F;
            margin-top: 20px;
            font-size: 35px;
            margin-bottom: 100px;
        }
        #contato{
            text-align: center;
            font-size: 20px;
            color: #556B2F;
            
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;

        }
        #container {
            display: flex;
            align-items: center;
            width: 50%;
            margin-bottom: 20px;
        }
        #container1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            margin: 0 auto;
            margin-bottom: 30px;
        }
        .textarea-maior {
            width: 100%;           /* Largura de 100% do contêiner */
            height: 150px;         /* Aumenta a altura do campo */
            text-align: left;     /* Alinha o texto (placeholder) à direita */
            padding-right: 10px;   /* Espaço à direita para evitar que o texto encoste no final do campo */
        }
        .textarea-maior::placeholder {
            text-align: left;     /* Garante que o placeholder fique à direita */
            vertical-align: top;   /* Alinha o texto no topo */
        }
        #botao{
             background-color: #556B2F;
             border-radius: 5px;
             color: white;
             margin-top: 18px;
             padding: 5px;
             width: 80px;
             margin-bottom: 50px;
        }
        #rodape{
            
            background-color: #556B2F;
            height: 70px;
            margin-top: 30px;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 100px;
        }


        </style>
        
    </head>

    <body>
        <header>
        <nav class="navbar " id="nav">
                <a href="painel.php"><img src="imagem/img_logo3.jpeg" alt="logo" id="logo"></a>  
                <ul class="nav justify-content-end">
                <li class="nav-item"><a href="sobrenos.php" class="nav-link">Sobre nós</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Ver Carrinho</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <h3>Contato</h3>
        <form>
            <div class="row" id="container">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
            </div>
        </form>
        <form>
            <div class="form-group" id="container1">
                <label for="message"></label>
                <textarea class="form-control textarea-maior" id="message" placeholder="Como podemos ajudar?"></textarea>
                <input class="btn" type="submit" value="Submit" id="botao">
            </div>
        </form>
        <p id="contato">decorhouse@hotmail.com</p>
        <p id="contato">Rua das Flores, 123 - Sala 01, Bairro Elegante, <br> Cidade: São Paulo, CEP: 01234-567</p>
        
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
