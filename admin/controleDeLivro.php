<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs controle de livros</title>

    <!--Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"> </script>

    <!--vendor -->
    <link href="funcoes/vendor/aos/aos.css" rel="stylesheet">

    <script src="funcoes/vendor/aos/aos.js"></script>
    <script src="funcoes/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="funcoes/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="funcoes/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="js/efeitos.js"></script>

    <!-- css  -->
    <link href="css/mainAdmin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="icon" type="image/png" sizes="16x16" href="imagens/favicon-16x16.png">

    <style>
    .img_lista {
        max-width: 100px;
        height: auto;
    }
    </style>

</head>

<body>

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Bibliotecs<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="controleDeAluno.php">controle de alunos</a></li>
                    <li><a href="controleDeLivro.php">controle de livros</a></li>
                    <li><a href="#Ajuda"> conta</a></li>
                    <li><a href="blog.html">cadastro de livros</a></li>
                    <li><a href="blog.html">notificações</a></li>
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->


    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Bem-Vindo a <span>Bibliotecs</span></h2>
                    <p>Desvende mundos, inspire-se e deixe sua imaginação voar com nossos livros cuidadosamente
                        selecionados. Retire um livro hoje e comece uma aventura que só os livros podem oferecer.
                        Bem-vindo à nossa biblioteca online, onde cada página é uma descoberta</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="imagens/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>
        </div>

        <?php
      
    ?>
    </section>

    <?php
//chamar o arquivo de conexao
require_once "conexao.php";

?>
    <p class="fs-2 text-center mt-5">Livros Cadastrados</p>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">AUTOR</th>
                    <th scope="col">ANO</th>
                    <th scope="col">EDITORA</th>
                    <th scope="col">DESTAQUE</th>
                    <th scope="col">IMAGEM</th>
                    <th  colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
      try {
        $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livros WHERE arquivo2 IS NULL OR arquivo2 = '';");
        $consulta->execute();
        $totalLivros = $consulta->fetch(PDO::FETCH_ASSOC)['total'];
        $livrosPorPagina = 10; // Número de livros por página
        $totalPaginas = ceil($totalLivros / $livrosPorPagina);

        $paginaAtual1 = isset($_GET['pagina1']) ? max(1, $_GET['pagina1']) : 1;
        $indiceInicial = ($paginaAtual1 - 1) * $livrosPorPagina;

        $consulta = $conn->prepare("SELECT * FROM tbl_livros WHERE arquivo2 IS NULL OR arquivo2 = '' LIMIT $indiceInicial, $livrosPorPagina;");
        $consulta->execute();

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id_liv"] . '</td>';
            echo '<td>' . $row["nome"] . '</td>';
            echo '<td>' . $row["autor"] . '</td>';
            echo '<td>' . $row["ano"] . '</td>';
            echo '<td>' . $row["editora"] . '</td>';
            echo '<td>' . $row["destaque"] . '</td>';
            echo '<td><img src="' . $row["arquivo"] . '" class="img_lista img-fluid"></td>';
            echo '<td>';
            echo '<a href="alterar.php?al=' . $row["id_liv"] . '">Alterar</a>';
            echo '</td>';
            echo '<td>';
            echo '<a href="controleDeLivro.php?ex=' . $row["id_liv"] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
          }
        } catch (PDOException $erro) {
          echo $erro->getMessage();
        }
        ?>
      </tbody>
    </table>
    
    <?php
      try{
        try {
            if (isset($_REQUEST["ex"])) {
                $id = $_REQUEST["ex"];
                
                // Recupere o nome do livro antes de excluí-lo
                $stmt = $conn->prepare("SELECT nome FROM tbl_livros WHERE id_liv = :id_liv");
                $stmt->bindValue(':id_liv', $id);
                $stmt->execute();
                $livro = $stmt->fetch(PDO::FETCH_ASSOC);
        
                // Exclua o registro
                $delete = $conn->prepare("DELETE FROM tbl_livros WHERE id_liv = :id_liv");
                $delete->bindValue(':id_liv', $id);
                $delete->execute();
        
                // Mostre o alerta com o nome do livro
                echo "<script language=javascript>
                      alert('O livro \"" . $livro['nome'] . "\" foi excluído com sucesso!');
                      location.href = 'controleDeLivro.php';
                      </script>";
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
      }catch(PDOException $erro){
        echo $erro->getMessage();
      }
       $conn;
       ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center custom-pagination">
                <?php
    $groupSize = 5; // Número de páginas em cada grupo
    $startPage = 1; // coloca os ... (3 pontos) depois de 5 paginas 

    if ($paginaAtual1 > $groupSize) {
      $startPage = $paginaAtual1 - floor($groupSize / 2);
    }

    for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
      $activeClass = $i == $paginaAtual1 ? 'active' : '';

      if ($i == $startPage && $i > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina1=' . ($i - 1) . '">...</a></li>';
      }

      echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina1=' . $i . '">' . $i . '</a></li>';

      if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina1=' . ($i + 1) . '">...</a></li>';
      }
    }
    ?>
            </ul>
        </nav>



    </div>

        <p class="fs-2 text-center mt-5">Livros em PDF Cadastrados</p>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">AUTOR</th>
                    <th scope="col">ANO</th>
                    <th scope="col">EDITORA</th>
                    <th scope="col">DESTAQUE</th>
                    <th scope="col">IMAGEM</th>
                    <th scope="col">DOWNLOAD</th>
                    <th  colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
      try {
        $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livros WHERE arquivo2 IS NOT NULL AND arquivo2 <> '';");
        $consulta->execute();
        $totalLivros = $consulta->fetch(PDO::FETCH_ASSOC)['total'];
        $livrosPorPagina = 10; // Número de livros por página
        $totalPaginas = ceil($totalLivros / $livrosPorPagina);
    
        $paginaAtual2 = isset($_GET['pagina2']) ? max(1, $_GET['pagina2']) : 1;
        $indiceInicial = ($paginaAtual2 - 1) * $livrosPorPagina;
    
        $consulta = $conn->prepare("SELECT * FROM tbl_livros WHERE arquivo2 IS NOT NULL AND arquivo2 <> '' LIMIT $indiceInicial, $livrosPorPagina;");
        $consulta->execute();
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id_liv"] . '</td>';
            echo '<td>' . $row["nome"] . '</td>';
            echo '<td>' . $row["autor"] . '</td>';
            echo '<td>' . $row["ano"] . '</td>';
            echo '<td>' . $row["editora"] . '</td>';
            echo '<td>' . $row["destaque"] . '</td>';
            echo '<td><img src="' . $row["arquivo"] . '" class="img_lista img-fluid"></td>';
            echo '<td><a href="' . $row["arquivo2"] . '">Download</a></td>';
            echo '<td>';
            echo '<a href="alterar.php?al=' . $row["id_liv"] . '">Alterar</a>';
            echo '</td>';
            echo '<td>';
            echo '<a href="controleDeLivro.php?ex=' . $row["id_liv"] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
          }
        } catch (PDOException $erro) {
          echo $erro->getMessage();
        }
        ?>
      </tbody>
    </table>
    
    <?php
      try{
        try {
            if (isset($_REQUEST["ex"])) {
                $id = $_REQUEST["ex"];
                
                // Recupere o nome do livro antes de excluí-lo
                $stmt = $conn->prepare("SELECT nome FROM tbl_livros WHERE id_liv = :id_liv");
                $stmt->bindValue(':id_liv', $id);
                $stmt->execute();
                $livro = $stmt->fetch(PDO::FETCH_ASSOC);
        
                // Exclua o registro
                $delete = $conn->prepare("DELETE FROM tbl_livros WHERE id_liv = :id_liv");
                $delete->bindValue(':id_liv', $id);
                $delete->execute();
        
                // Mostre o alerta com o nome do livro
                echo "<script language=javascript>
                      alert('O livro \"" . $livro['nome'] . "\" foi excluído com sucesso!');
                      location.href = 'controleDeLivro.php';
                      </script>";
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
      }catch(PDOException $erro){
        echo $erro->getMessage();
      }
       $conn;
       ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center custom-pagination">
                <?php
    $groupSize = 5; // Número de páginas em cada grupo
    $startPage = 1; // coloca os ... (3 pontos) depois de 5 paginas 

    if ($paginaAtual2 > $groupSize) {
      $startPage = $paginaAtual2 - floor($groupSize / 2);
    }

    for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
      $activeClass = $i == $paginaAtual2 ? 'active' : '';

      if ($i == $startPage && $i > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina2=' . ($i - 1) . '">...</a></li>';
      }

      echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina2=' . $i . '">' . $i . '</a></li>';

      if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina2=' . ($i + 1) . '">...</a></li>';
      }
    }
    ?>
            </ul>
        </nav>



    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Bibliotecs</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>contato</h4>
                    <ul>
                        <p>
                            <strong>Phone:</strong>
                            <br> (65) 3885-5712<br>
                            (79) 2937-7594<br>
                            <strong>Email:</strong>
                            <br>info@example.com<br>
                            info@example.com<br>
                        </p>
                        <strong>Endreço:</strong>
                        <br>Rua maria das Dores , 000, São José Do Rio Pardo-SP<br>
                        </p>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>quem somos</h4>
                    <p>A reserva online de livros em bibliotecas oferece um acesso conveniente a uma variedade de obras
                        digitais, possibilitando empréstimos virtuais e flexibilidade na leitura por meio de
                        dispositivos. Além disso, a opção de retirada presencial após a reserva no site promove o acesso
                        acessível ao conhecimento e à cultura</p>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>telefones para doações</h4>
                    <p>
                        (65) 1234-5712<br>
                        (79) 4321-7594<br>
                    </p>

                </div>

            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->



</body>

</html>