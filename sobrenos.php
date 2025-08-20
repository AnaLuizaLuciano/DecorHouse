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
            margin-top: 50px;
            font-size: 35px;
            margin-bottom: 30px;
        }
        #sobre{
            background-color: white;
            width: 80%;
            font-size: 20px;
            text-align: center;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            color: gray;
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
                    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Ver Carrinho</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <h3>sobre nós</h3>
            <div id="container">
                <p id="sobre">Bem-vindo à Decorhouse!
                    Somos uma loja de decorações apaixonada por criar espaços únicos e personalizados que refletem a personalidade e o estilo de cada cliente. Nossa missão é fornecer produtos de alta qualidade, designs inovadores e serviços excepcionais para ajudar você a transformar sua casa em um lar aconchegante e acolhedor.
                    Com anos de experiência no mercado, nossa equipe é composta por profissionais dedicados e apaixonados por decoração, que estão sempre prontos para ajudar você a encontrar o item perfeito para seu espaço. Nossa loja oferece uma ampla variedade de produtos, desde móveis e iluminação até acessórios e objetos de decoração, todos cuidadosamente selecionados para garantir a melhor qualidade e estilo.
                    Nossa filosofia é simples: acreditamos que a decoração é uma forma de expressar a personalidade e o estilo de cada pessoa, e estamos comprometidos em ajudar você a criar um espaço que seja verdadeiramente seu. Seja você um amante de designs clássicos ou modernos, nossa equipe está aqui para ajudá-lo a encontrar o que você precisa para criar o espaço dos seus sonhos.
                    Nossos Valores
                    Qualidade: nos comprometemos a fornecer produtos de alta qualidade que atendam às necessidades e expectativas de nossos clientes.
                    Estilo: acreditamos que a decoração é uma forma de expressar a personalidade e o estilo de cada pessoa.
                    Serviço: nossa equipe está sempre pronta para ajudar e fornecer serviços excepcionais.
                    Inovação: estamos sempre procurando por novas tendências e produtos para manter nossa loja atualizada e inspiradora.
                    Por que escolher a Decorhouse?
                    Ampla variedade de produtos de alta qualidade
                    Equipe experiente e dedicada
                    Serviços personalizados para atender às suas necessidades
                    Ambiente acolhedor e inspirador
                    Estamos ansiosos para ajudá-lo a criar o espaço dos seus sonhos! Visite-nos hoje mesmo e descubra como podemos ajudá-lo a transformar sua casa em um lar aconchegante e acolhedor.</p>
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
