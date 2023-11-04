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
        if (isset($_REQUEST['id_liv'])) {
 
            $idlivro = $_GET['id_liv'];
            // Consulta SQL para recuperar o preço e a capa do jogo com base no código
            $consulta = $conn->prepare("SELECT * FROM tbl_livro where id_liv = $idlivro ");
            $consulta->execute();
            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $categoria = $row['categoria'];
                $nome = $row['nome'];
                $autor = $row['autor'];
                $ano = $row['ano'];
                $arquivo = $row['arquivo'];
                $arquivo2 = $row['arquivo2'];
                $destaque = $row['destaque'];
                $descricao = $row['descricao'];
                $editora = $row['editora'];
            }
            // $nome = "BLÁ -  BLÁ";
            // $arquivo = "caminho_para_imagem_padrao.jpg"; // Coloque o caminho da imagem padrão caso não tenha capa
        }
        ?>
        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $arquivo; ?>" class="card-img-top" alt="Capa do livro">
                    <div class="card-body">
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nome; ?></h5>
                        <p class="card-text">DESCRICAO<?php echo $descricao; ?></p>
                        <p class="card-text">Autor(a): <?php echo $autor; ?></p>
                        <p class="card-text">Ano: <?php echo $ano ?></p>
                        <p class="card-text">Editora: <?php echo $editora; ?></p>
                        <p class="card-text">Categoria: <?php echo $categoria; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <p>
        <form action="detalhes.php?id_liv=<?php echo urlencode($idlivro); ?>" method="POST">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary red-color-button" type="submit" name="Reservar" value="Reservar" id="botao">Reservar</button>
    </div>
</form>
        <?php
            if (isset($_REQUEST["Reservar"])) {


                $idlivro = $_GET['id_liv'];
                $idAluno = $_SESSION["id"];
                $turma = 2;
                $disponibilidade = "retirado";

                $dataAtual = date('Y-m-d');

                $dateTimeAtual = new DateTime($dataAtual);

                $dateTimeAtual->modify('+7 days');

                $dataDeEntrega = $dateTimeAtual->format('Y-m-d');
                $consultaCount = $conn->prepare("SELECT COUNT(*) as total_reservas FROM tbl_reservado WHERE idAluno = :idAluno");
                $consultaCount->bindValue(':idAluno', $idAluno);
                $consultaCount->execute();
                $resultCount = $consultaCount->fetch(PDO::FETCH_ASSOC);
                
                // Verifique se o aluno já fez mais de 3 reservas
                if ($resultCount['total_reservas'] >= 3) {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Quantidade de reservas excedida!',
                        html: '<p>O usuario pode reservar 3 livros apenas!</p>',
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
                     
                } else {
                    try{
                        $sql = $conn->prepare("UPDATE tbl_livro SET disponibilidade = :disponibilidade  WHERE id_liv = :id_liv");
                    
                        $sql->bindValue(':id_liv', $idlivro);
                        $sql->bindValue(':disponibilidade', $disponibilidade);
                    
                        $sql->execute();
                    }catch (PDOException $erro) {
                            echo $erro->getMessage();
                    }

                    try{
                        $sql = $conn->prepare("INSERT INTO tbl_reservado (id, idAluno, idLivro, dataDeReserva ,dataDeEntrega)
                        VALUES (:id, :idAluno, :idLivro, :dataDeReserva, :dataDeEntrega)");
                
                        $sql->bindValue(':id', null);   
                        $sql->bindValue(':idAluno', $idAluno);
                        $sql->bindValue(':idLivro', $idlivro);
                        $sql->bindValue(':dataDeReserva', $dataAtual);
                        $sql->bindValue(':dataDeEntrega', $dataDeEntrega);
                        $sql->execute();

                        echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Livro reservado com sucesso!',
                            html: '<p>A reserva do livro é de 7 dias podendo ter a possibilidade de renovação da reserva por mais 7 dias!</p>',
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

                    }catch (PDOException $erro) {
                        echo $erro->getMessage();
                    }
            }
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
  