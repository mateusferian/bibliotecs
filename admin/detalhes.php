<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Detalhes do Jogo</title>
    <!-- Seus links CSS do Bootstrap e outros recursos -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="imagens/favicon-16x16.png">

    <style>
        .img_novidades {
            max-width: 80%;
            height: auto;
        }

        .img_tamanho {
            max-width: 300px;
            height: auto;
        }
    </style>
</head>
<body>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <h1>Bibliotecs<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="game.php">Home</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Bibliotecs</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    
    <div class="container">
        <?php
        if(isset($_GET['codgame'])) {
            // Conexão com o banco de dados (substitua pelos detalhes da sua conexão)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bd_games";

            // Cria a conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Obtém o código do jogo da URL
            $codgame = $_GET['codgame'];

            // Consulta SQL para recuperar o preço e a capa do jogo com base no código
            $sql = "SELECT nome, arquivo FROM games WHERE codgame = $codgame";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome = $row['nome'];
                $capa = $row['arquivo'];
            } else {
                $nome = "Preço não disponível";
                $capa = "caminho_para_imagem_padrao.jpg"; // Coloque o caminho da imagem padrão caso não tenha capa
            }

            // Fecha a conexão com o banco de dados
            $conn->close();
        }
        ?>

        <h1>Detalhes do Jogo</h1>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $capa; ?>" class="card-img-top" alt="Capa do Jogo">
            <div class="card-body">
                <p class="card-text"><?php echo $nome; ?></p>
            </div>
        </div>
    </div>

    <!-- Seus scripts aqui -->

</body>
</html>
