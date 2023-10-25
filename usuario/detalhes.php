<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Descrição do Livro</title>
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
        body { font-family: Arial, sans-serif; 
                   margin: 0; 
                   padding: 20px; } 

.book { 
       border: 1px  solid #ccc; 
       padding: 10px; 
       max-width: 600px; 
       display:flex; } 


.book img { 
          max-width: 150px; 
          margin-right: 10px; } 

.book-details { 
              flex: 1; } 

.book-title { 
            font-size: 24x; 
            margin: 0; } 


.author { 
        font-size: 18px; 
        color: #666; 
        margin: 5px 0; } 

.description { 
             font-size: 16px; 
             margin-top: 10px;
            line-height: 1.4 } 
           
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



        if(isset($_REQUEST['id_liv'])) {
           
            include_once "conexao.php";
            // Obtém o código do jogo da URL
            $idlivro = $_GET['id_liv'];
            echo "teste: ".$idlivro;
            // Consulta SQL para recuperar o preço e a capa do jogo com base no código
            $consulta = $conn->prepare("SELECT * FROM tbl_livro where id_liv = $idlivro ");
            $consulta->execute();
  
                while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
           
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
	   </diV>
               
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
  
  
<p><div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary red-color-button" type="button">Reservar</button></p>
  /<?php
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
         
        }    $conn->error;*/
    
?>
</body>
</style>           
</head> 
