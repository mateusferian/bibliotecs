<?php
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary red-color-button" type="button">Reservar</button>
        </div>
        <?php
        $idlivro = $_GET['id_liv'];
        $check_sql = "SELECT * FROM tbl_reservar WHERE id = '$idlivro' AND nome = '$nome'";
        $result = $conn->query($check_sql);
        /*
        if ($result->num_rows > 0) {
            echo "<script language=javascript>
            alert('Desculpe, este livro já está ocupado.!!');
            location.href = 'home.php';
            </script>";
        } else {
            // Inserir agendamento no banco de dados
            $insert_sql = "INSERT INTO tbl_reservar (nome, id, rm, turma) VALUES ('$idlivro', '$nome', '$rm', '$turma')";
        }

        if ($conn->query($insert_sql) === TRUE) {
            echo "<script language=javascript>
            alert('reservamento criado com sucesso !!');
            location.href = 'home.php';
            </script>";
        } else {
            echo "<script language=javascript>
            alert('Erro ao reservar o livro: !!');
            location.href = 'detalhes.php';
            </script>";
        } $conn->error;*/
        ?>
        <br><br><br><br>
        <br><br><br><br>
        </div>
        <?php
        require_once "include/footer.php";
        require_once "include/scrollTop.php";
  ?>
  </body>
  