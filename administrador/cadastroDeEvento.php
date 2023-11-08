

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs</title>

    <link href="../bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/cadastroAdministrador.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="imagensDeFundo/logo.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</head>

<body>

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
                    window.location.href = '../index.php';
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