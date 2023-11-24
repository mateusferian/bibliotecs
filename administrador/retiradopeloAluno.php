<?php
    require_once "include/header.php";
?>

    <link href="css/main.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>



    <style>
        .img_novidades {
            max-width: 80%;
            height: auto;
        }

        .img_tamanho {
            max-width: 300px;
            height: auto;
        }

        .book {
            border: 1px solid #ccc;
            padding: 10px;
            max-width: 600px;
            display: flex;
        }

        .book img {
            max-width: 150px;
            margin-right: 10px;
        }

        .book-details {
            flex: 1;
        }

        .book-title {
            font-size: 24px; /* Alterei '24x' para '24px' */
            margin: 0;
        }

        .author {
            font-size: 18px;
            color: #666;
            margin: 5px 0;
        }

        .description {
            font-size: 16px;
            margin-top: 10px;
            line-height: 1.4;
        }

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
<?php
    $nomeDaPagina ="Livros reservados pelo aluno";

    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
?>
    <div class="container">
    <br>

<?php
$idAluno = $_GET["id"];

$consultaReserva = $conn->prepare("SELECT * FROM tbl_reservado WHERE idAluno = :idAluno");
$consultaReserva->bindValue(':idAluno', $idAluno);
$consultaReserva->execute();
$totalReserva= $consultaReserva ->rowCount();

$consultaAluno = $conn->prepare("SELECT * FROM tbl_aluno WHERE id = :id");
$consultaAluno->bindValue(':id', $idAluno);
$consultaAluno->execute();
$aluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Seu código de cabeçalho aqui -->
</head>
<body>
<section id="reservado" class="container">


    <!-- Linha 1 - Produtos -->
    <div class="row text-center mt-5">
        <?php
        if($totalReserva < 1){
            ?>
            <p class="fs-1 text-center">O Aluno <?php echo $aluno["nome"]; ?> não possui livros reservados</p>

            <?php
        }else{
            ?>
            <?php
            while ($rowReserva = $consultaReserva->fetch(PDO::FETCH_ASSOC)) {
                $idLivro = $rowReserva["idLivro"];
                $consultaLivro = $conn->prepare("SELECT * FROM tbl_livro WHERE id_liv = :idLivro");
                $consultaLivro->bindValue(':idLivro', $idLivro);
                $consultaLivro->execute();
                $livro = $consultaLivro->fetch(PDO::FETCH_ASSOC);



                $consultaReservaLivro = $conn->prepare("SELECT * FROM tbl_reservado WHERE idLivro = :idLivro AND idAluno = :idAluno ");
                $consultaReservaLivro->bindValue(':idLivro', $idLivro);
                $consultaReservaLivro->bindValue(':idAluno', $idAluno);
                $consultaReservaLivro->execute();
                $rowReservaLivro = $consultaReservaLivro->fetch(PDO::FETCH_ASSOC);

            ?>
                <div class="col-sm-4 mt-5">
                <img src="<?php echo $livro["arquivo"]?>" class="card-img-top img_tamanho">
                    <h5 class="card-title"><?php echo $livro["nome"] ?></h5>
                    <?php
                    $dataEntrega = strtotime($rowReservaLivro["dataDeEntrega"]);
                    $dataAtual = time();

                    if ($dataAtual > $dataEntrega) {
                        $cor = 'red';

                    } else {
                        $cor = 'green';

                    }
                    ?>

                    <p style="color: <?php echo $cor; ?>">Data de Entrega: <?php echo date("d/m/Y", $dataEntrega); ?></p>

                </div>
            <?php }}?>
            
    </div>
</section>
        <br><br><br><br>
        <br><br><br><br>
        </div>
        <?php
        require_once "include/footer.php";
        require_once "include/scrollTop.php";
  ?>
  </body>