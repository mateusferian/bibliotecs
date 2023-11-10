

<?php
    require_once "../restrito.php";
    require_once "include/header.php";
?>

    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/cadastroEvento.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">




</head>

<body>
<?php
    require_once "include/navbar.php"
    ?>
    <script>
    AOS.init();
    </script>

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="cadastroDeEvento.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Cadastro de evento</h1>
                    <br><br>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                        <label>Nome</label>
                            <input type="text" name="nome" class="form-control"
                                placeholder="digite o seu e-mail institucional" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>descrição</label>
                            <input type="text" name="descricao" class="form-control" placeholder="digite o a descrição do evento"
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Data:</label>
                            <input type="date" name="dataEvento" class="form-control" 
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 offset-md-5">
                            <input id="formulario" type="submit" value="cadastrar" class="btn" name="cadastrar">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    require_once "../conexao.php";

    if (isset($_REQUEST["cadastrar"])){

      $nome = $_REQUEST["nome"];
      $descricao = $_REQUEST["descricao"];
      $dataEvento = $_REQUEST["dataEvento"];


      try{ 
        $sql = $conn->prepare("INSERT INTO tbl_evento (id, nome, descricao, dataEvento)
        VALUES (:id, :nome, :descricao, :dataEvento)");

        $sql->bindValue(':id', null);   
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':dataEvento', $dataEvento);

        $sql->execute();
        echo "<script>
            Swal.fire({
                title: 'Cadastro de evento realizado com Sucesso!!',
                customClass: {
                    popup: 'swalFireCadastroAdministrador',
                },
                showCancelButton: false,
                confirmButtonText: 'Ir para a página de controle',
                timer: 4000, 
                timerProgressBar: true, 
                allowOutsideClick: false      
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'controleDeEvento.php';
                }
            });
        </script>";

        
      } 
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    }
    $conn;

    require_once "include/footer.php";
    require_once "include/scrollTop.php";
?>
</body>

</html>