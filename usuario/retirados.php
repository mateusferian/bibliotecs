<?php
    require_once "../restrito.php";
    require_once "include/header.php";
?>

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
    require_once "include/navbar.php";
    require_once "include/hero.php";
?>
    <div class="container">
    <br><br><br><br>
        <br><br><br><br>

<?php
$idAluno = $_SESSION["id"];

$consultaReserva = $conn->prepare("SELECT * FROM tbl_reservado WHERE idAluno = :idAluno");
$consultaReserva->bindValue(':idAluno', $idAluno);
$consultaReserva->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Seu código de cabeçalho aqui -->
</head>
<body>
<section id="reservado" class="container">
    <p class="fs-1 text-center">Livros Reservado</p>

    <!-- Linha 1 - Produtos -->
    <div class="row text-center mt-5">
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
            <img src="<?php echo $livro["arquivo"]?>" class="card-img-top img_tamanho" alt="<?php echo $livro["nome"]?>">
                <h5 class="card-title"><?php echo $livro["nome"] ?></h5>
                <p>Data de Entrega: <?php echo date("d/m/Y", strtotime($rowReservaLivro["dataDeEntrega"])) ?></p>
                <p><a href="renovar.php?id=<?php echo $livro['id_liv'] ?>" class="btn" id="botao">Renovar</a></p>
            </div>
        <?php } ?>
    </div>
</section>

        <?php
        if (isset($_GET["renovado"])) { 

            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Livro renovado com sucesso!',
                html: '<p>o Livro XXX foi renovado por mais 7 dias!!!</p>',
                customClass: {
                    popup: 'swalFireControleDeAlunoApagado',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirecione automaticamente após um breve atraso
            setTimeout(function() {
                window.location.href = 'home.php';
            }, 4000);
             </script>";
        }

        if (isset($_GET["renovacaoBloquada"])) { 

            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Só é permitido renovar o livro uma vez!',
                html: '<p>o Livro XXX foi renovado por mais 7 dias!!!</p>',
                customClass: {
                    popup: 'swalFireControleDeAlunoApagado',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirecione automaticamente após um breve atraso
            setTimeout(function() {
                window.location.href = 'home.php';
            }, 4000);
             </script>";
        }
        ?>
        <br><br><br><br>
        <br><br><br><br>
        </div>
        <?php
        require_once "include/footer.php";
        require_once "include/scrollTop.php";
  ?>
  </body>