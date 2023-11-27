

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
    <link rel="stylesheet" href="css/alterarAdministrador.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logoWeb.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</head>

<body>
<?php
    require_once "protect.php";
?>
    <script>
    AOS.init();
    </script>
    <?php
    require_once "../conexao.php";
    try{
        if(isset($_REQUEST["al"])) {
         
       $id = $_REQUEST["al"];
       $consulta = $conn->prepare("SELECT * FROM tbl_administrador where id=:id;");
       $consulta->bindValue(':id', $id);
       $consulta->execute();
       $row=$consulta -> fetch(PDO::FETCH_ASSOC);
       }
       
       }
       
       catch (PDOException $erro){
           echo $erro->getMessage();
       }
     ?>

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="alterarAdministrador.php?protect=2343431" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Alterar administrador</h1>
                    <br><br>

                    <div class="form-group text-center">
                        <div class="col-md-6 offset-md-3">
                            <label> Id: </label><br>
                            <input type="text" name="id" class="form-control"
                                value="<?php if(isset($row['id'])) {echo $row['id'];} ?>" readonly="readonly"><br>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-md-6 offset-md-3">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control"
                                value="<?php if(isset($row['email'])) {echo $row['email'];} ?>"><br>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo</label>
                            <input type="text" name="nome" class="form-control"
                                value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-md-6 offset-md-3">
                            <label for="situacao">Situação</label>
                            <select class="form-control" name="situacao" id="situacao">
                                <option value="1"
                                    <?php if (isset($row['situacao']) && $row['situacao'] == 1) { echo 'selected'; } ?>>
                                    Ativado</option>
                                <option value="0"
                                    <?php if (isset($row['situacao']) && $row['situacao'] == 0) { echo 'selected'; } ?>>
                                    Desativado</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group text-center">
                        <a class="form-links" href="controleDeAdministrador.php?protect=434341212">deseja voltar para
                            controle de administrador? clique aqui </a>
                    </div>
                    <br><br>

                    <div class="form-group text-center">
                        <div class="col-md-5 offset-md-5 mx-auto">
                            <input id="formulario" type="submit" value="Alterar Dados" class="btn" name="Alterar">
                        </div>
                        <br><br>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php

    if (isset($_REQUEST["Alterar"])) {

      $nome = $_REQUEST["nome"];
      $email = $_REQUEST["email"];
      $idAdministrador = $_REQUEST["id"];
      $dataCadastro = date("Y-m-d");
      $situacao = $_REQUEST["situacao"];


      $consultaAdministrador = $conn->prepare("SELECT * FROM tbl_administrador WHERE email=:email AND id != :id;");
      $consultaAdministrador->bindValue(':email', $email);
      $consultaAdministrador->bindValue(':id', $idAdministrador);
      
      $consultaAdministrador->execute();
      $rowAdministrador = $consultaAdministrador->fetch(PDO::FETCH_ASSOC);
      $totalRowAdministrador = $consultaAdministrador ->rowCount();


      $consultaAluno = $conn->prepare("SELECT * FROM  tbl_aluno WHERE email=:email;");

      $consultaAluno->bindValue(':email' , $email);
      $consultaAluno->execute();
      $rowAluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
      $totalRowAluno = $consultaAluno ->rowCount();



      if ($totalRowAdministrador > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Email já utilizado',
                html: '<p>O email: \"" . $email . "\" já está sendo utilizado</p>',
                customClass: {
                    popup: 'swalFireCadastroAdministrador',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirect automatically after a brief delay
            setTimeout(function() {
                window.location.href = 'controleDeAdministrador.php?protect=2343431';
            }, 4000);
        </script>";
    } else if ($totalRowAluno > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Email já utilizado',
                html: '<p>O email: \"" . $email . "\" já está sendo utilizado</p>',
                customClass: {
                    popup: 'swalFireCadastroAdministrador',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirect automatically after a brief delay
            setTimeout(function() {
                window.location.href = 'controleDeAdministrador.php?protect=2343431';
            }, 4000);
        </script>";
    } else {
      try{ 
        $sql = $conn->prepare("UPDATE tbl_administrador SET nome = :nome, email = :email, dataCadastro = :dataCadastro, situacao = :situacao WHERE id = :id");

        $sql->bindValue(':id', $idAdministrador);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':dataCadastro', $dataCadastro);
        $sql->bindValue(':situacao', $situacao);
        

        $sql->execute();
        echo "<script>
        Swal.fire({
            title: 'Alteração de administrador realizada com Sucesso!!',
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
                window.location.href = 'controleDeAdministrador.php?protect=2343431';
            } else {
                window.location.href = 'controleDeAdministrador.php?protect=2343431';
            }
        });
    </script>";
    

        
      } 
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    }
    }

    $conn;
    ?>
</body>

</html>