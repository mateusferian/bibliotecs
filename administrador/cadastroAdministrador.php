
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>

    <link href="../bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastroAdministrador.css">

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
                <form class="form" action="cadastroAdministrador.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Cadastro</h1>
                    <br><br>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-MAIL INSTITUCIONAL</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="digite o seu e-mail institucional" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo</label>
                            <input type="text" name="nome" class="form-control" placeholder="digite o seu nome"
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" 
                                required="">
                        </div>
                    </div>
                    <a class="form-links" href="../index.php">Já tenho uma conta</a>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-5 offset-md-5">
                            <input type="submit" value="Cadastra-se" class="btn btn-primary" name="Cadastra-se">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    require_once "../conexao.php";

    if (isset($_REQUEST["Cadastra-se"])) {

      $nome = $_REQUEST["nome"];
      $email = $_REQUEST["email"];
      $senha = $_REQUEST["senha"];
      $dataCadastro = date("Y-m-d");
      $hash = password_hash($senha, PASSWORD_DEFAULT);


      $consultaAdministrador = $conn->prepare("SELECT * FROM  tbl_administrador WHERE email=:email;");

      $consultaAdministrador->bindValue(':email' , $email);
      $consultaAdministrador->execute();
      $rowAdministrador = $consultaAdministrador->fetch(PDO::FETCH_ASSOC);
      $totalRowAdministrador = $consultaAdministrador ->rowCount();


      $consultaAluno = $conn->prepare("SELECT * FROM  tbl_aluno WHERE email=:email;");

      $consultaAluno->bindValue(':email' , $email);
      $consultaAluno->execute();
      $rowAluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
      $totalRowAluno = $consultaAluno ->rowCount();



    if($totalRowAdministrador > 0 ){

        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Email já utilizado',
            html: '<p>O email: \"" . $email . "\" já está sendo utilizado</p>',
            customClass: {
                popup: 'swalFireCadastroAdministrador', // Classe CSS personalizada para a caixa de diálogo
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        // Redirecione automaticamente após um breve atraso
        setTimeout(function() {
            window.location.href = 'cadastroAdministrador.php?protect=2343431';
        }, 3000); // Tempo em milissegundos (2 segundos no exemplo) antes de redirecionar
    </script>";

    }else if($totalRowAluno > 0 ){

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

        setTimeout(function() {
            window.location.href = 'cadastroAdministrador.php?protect=2343431';
        }, 5000);
    </script>";

    }else{
      try{ 
        $sql = $conn->prepare("INSERT INTO tbl_administrador (id, nome, email, senha ,dataCadastro, recuperar_senha)
                            VALUES (:id, :nome, :email, :senha, :dataCadastro, :recuperar_senha) ");
        
        $sql->bindValue(':id', null);   
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $hash);
        $sql->bindValue(':dataCadastro', $dataCadastro);
        $sql->bindValue(':recuperar_senha', "0");

        $sql->execute();
        echo "<script>
            Swal.fire({
                title: 'Cadastro de administrador realizado com Sucesso!!',
                customClass: {
                    popup: 'swalFireCadastroAdministrador',
                },
                showCancelButton: false, // Não mostrar o botão de cancelar
                confirmButtonText: 'Ir para a página de login',
                timer: 5000, 
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
    }

    $conn;
    ?>
</body>

</html>