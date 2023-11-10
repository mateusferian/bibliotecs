

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
    require_once "include/navbar.php";

    try{
    if(isset($_REQUEST["al"])) {
        
    $id = $_REQUEST["al"];
    $consulta = $conn->prepare("SELECT * FROM tbl_evento where id=:id;");
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $row=$consulta -> fetch(PDO::FETCH_ASSOC);
    }
    
    }
    
    catch (PDOException $erro){
        echo $erro->getMessage();
    }
    ?>

    <script>
    AOS.init();
    </script>

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="alterarEvento.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Alterar dados de eventos</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                        <label>Id:</label>
                            <input type="text" name="id" class="form-control"
                            value="<?php if(isset($row['id'])) {echo $row['id'];} ?>" readonly="readonly"><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                        <label>Nome</label>
                            <input type="text" name="nome" class="form-control"
                                value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>descrição</label>
                            <input type="text" name="descricao" class="form-control"
                            value="<?php if(isset($row['descricao'])) {echo $row['descricao'];} ?>"><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Data:</label>
                            <input type="date" name="dataEvento" class="form-control" 
                            value="<?php if(isset($row['dataEvento'])) {echo $row['dataEvento'];} ?>"><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 offset-md-5">
                            <input id="formulario" type="submit" value="alterar" class="btn" name="alterar">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    require_once "../conexao.php";

    if (isset($_REQUEST["alterar"])){

      $id = $_REQUEST["id"];
      $nome = $_REQUEST["nome"];
      $descricao = $_REQUEST["descricao"];
      $dataEvento = $_REQUEST["dataEvento"];


      try{ 
        $sql = $conn->prepare("UPDATE tbl_evento SET nome = :nome, descricao = :descricao, dataEvento = :dataEvento WHERE id = :id");

        $sql->bindValue(':id', $id);   
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':dataEvento', $dataEvento);

        $sql->execute();
        echo "<script>
            Swal.fire({
                title: 'Alteração de evento realizado com Sucesso!!',
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
    ?>
</body>

</html>