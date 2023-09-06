<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>controle de alunos</title>

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
    .img_novidades {
        max-width: 80%;
        height: auto;
    }

    .img_tamanho {
        max-width: 300px;
        height: auto;
    }
    </style>

    <script src="js/bootstrap.min.js"> </script>

    <link rel="icon" type="image/png" sizes="16x16" href="imagens/favicon-16x16.png">

    <style>
    .img_lista {
        max-width: 100px;
        height: auto;
    }

    .botao-filtrar {
        background-color: rgba(0, 131, 116, 0.8);
        color: white;
        border: 2px solid rgba(0, 131, 116, 0.8);
    }

    /* Estilo de hover do botão */
    .botao-filtrar:hover {
        background-color: #99cdc7;
        color: white;
        border: 2px solid #99cdc7;
    }

    #meuBotao:active {
        background-color: #014d44;
        border: 2px solid #014d44;
        /* Cor quando o botão é clicado e segurado */
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



    <!-- ======= Hero Section ======= -->

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
                    <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
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

//verifica se o botão Cadastrar foi clicado
	

?>
    <p class="fs-2 text-center mt-5">Controle de Alunos</p>
    <div class="container mt-4">
        <form method="get">
            <p class="fs-5 mt-5">Opção de filtragem</p>
            <select class="form-control" name="filtro">
                <option value="opcao0">sem filtro</option>
                <option value="opcao1">há 7 dias</option>
                <option value="opcao2">há 14 dias</option>
                <option value="opcao3">há 21 dias</option>
                <option value="opcao4">mais de 21 dias</option>
            </select>
            <button id="meuBotao" type="submit" class="btn btn-primary mt-2 botao-filtrar">Filtrar</button>
        </form>
    </div>




    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL-INSTITUCIONAL</th>
                    <th scope="col">SALA</th>
                    <th scope="col">NOME DO LIVRO RETIRADO</th>
                    <th scope="col">DATA DA ENTREGA</th>
                    <th scope="col" colspan="2">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
            try {
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "opcao0";

                // Monta a consulta SQL baseado no filtro escolhido
                $consultaSQL = "SELECT * FROM tbl_alunos";

                if ($filtro === "opcao1") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 0 AND DATEDIFF(CURDATE(), dataEntrega) <= 7";
                } elseif ($filtro === "opcao2") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 7 AND DATEDIFF(CURDATE(), dataEntrega) <= 14";
                } elseif ($filtro === "opcao3") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 14 AND DATEDIFF(CURDATE(), dataEntrega) <= 21";
                } elseif ($filtro === "opcao4") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 21";
                }

                $consulta = $conn->prepare($consultaSQL);
                $consulta->execute();

                $totalAlunos = $consulta->rowCount();
                $alunosPorPagina = 10; // Número de alunos por página
                $totalPaginas = ceil($totalAlunos / $alunosPorPagina);

                $paginaAtual = isset($_GET['pagina']) ? max(1, $_GET['pagina']) : 1;
                $indiceInicial = ($paginaAtual - 1) * $alunosPorPagina;

                $consultaSQL .= " LIMIT $indiceInicial, $alunosPorPagina;";
                $consulta = $conn->prepare($consultaSQL);
                $consulta->execute();

                while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
                  ?>
                <tr>
                    <td><?php echo $row["id"] ?> </td>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["sala"] ?></td>
                    <td><?php echo $row["livro"] ?></td>
                    <td><?php echo $row["dataEntrega"] ?></td>
                    <td>
                        <a href="alterar.php?al=<?php echo $row["id"]; ?>">Alterar</a>
                        <a href="controleDeAluno.php?ex=<?php echo $row["id"]; ?>">Excluir</a>
                    </td>
                </tr>
                <?php
     }
     }catch(PDOException $erro){
       echo $erro->getMessage();
     }
  ?>
            </tbody>
        </table>
        <?php
    try{
     if (isset($_REQUEST["ex"])) {
        $id = $_REQUEST["ex"];
        
        // Recupere o nome do livro antes de excluí-lo
        $stmt = $conn->prepare("SELECT nome FROM tbl_alunos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        // Exclua o registro
        $delete = $conn->prepare("DELETE FROM tbl_alunos WHERE id = :id");
        $delete->bindValue(':id', $id);
        $delete->execute();

        // Mostre o alerta com o nome do livro
        echo "<script language=javascript>
              alert('O usuario \"" . $aluno['nome'] . "\" foi excluído com sucesso!');
              location.href = 'controleDeAluno.php';
              </script>";
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
            $startPage = 1;

            if ($paginaAtual > $groupSize) {
                $startPage = $paginaAtual - floor($groupSize / 2);
            }

            for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
                $activeClass = $i == $paginaAtual ? 'active' : '';

                if ($i == $startPage && $i > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i - 1) . '&filtro=' . $filtro . '">...</a></li>';
                }

                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina=' . $i . '&filtro=' . $filtro . '">' . $i . '</a></li>';

                if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i + 1) . '&filtro=' . $filtro . '">...</a></li>';
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>



    </div>
</body>

</html>