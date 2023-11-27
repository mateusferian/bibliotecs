
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logoWeb.png">

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
                <form class="form" action="cadastroAluno.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Cadastro</h1>
                    <br><br>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-mail </label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Digite o seu e-mail " required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome"
                                required="">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                    <div class="form-group">
        <label for="sala" >Sala</label>
          <select id="sala" name="sala" class="form-control">
            <option selected>Selecione a Sala</option>
            <option value="1º DS">1º DS</option>
            <option value="1º qui">1º quimica</option>
            <option value="1º info">1º info</option>
            <option value="1º LCHS">1º LCHS</option>
            <option value="1º en med">1º ensino médio</option>
            <option value="2º DS">2º DS</option>
            <option value="2º qui">2º quimica</option>
            <option value="2º info">2º info</option>
            <option value="2º LCHS">2º LCHS</option>
            <option value="2º en med">2º ensino médio</option>
            <option value="3º DS">3º DS</option>
            <option value="3º qui">3º quimica</option>
            <option value="3º info">3º info</option>
            <option value="3º LCHS">3º LCHS</option>
            <option value="3º ensino médio">3º ensino médio</option>
            <option value="segurança do Trabalho">Segurança do Trabalho</option>
            <option value="info">Informática para Internet</option>
            <option value="adm">Administração</option>
            <option value="qui">Química</option>

          </select> 
        </div> 
        </div> 


        <div class="col-md-6 offset-md-3">
                    <div class="form-group">
        <label for="periodo" >Periodo</label>
          <select id="periodo" name="periodo" class="form-control">
            <option selected>Selecione o Periodo</option>
            <option value="manhã">manhã</option>
            <option value="tarde">tarde</option>
            <option value="noite">noite</option>
            <option value="integrado">integrado - manhã e tarde</option>
        
          </select> 
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
                            <input type="submit" value="Cadastra-se"  id="formulario" class="btn btn-primary" name="Cadastra-se">
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
      $periodo = $_REQUEST["periodo"];
      $sala = $_REQUEST["sala"];
      $dataCadastro = date("Y-m-d");
      $situacao = 1;
      $hash = password_hash($senha, PASSWORD_DEFAULT);

      $consultaAdministrador = $conn->prepare("SELECT * FROM tbl_administrador WHERE email=:email;");
      $consultaAdministrador->bindValue(':email', $email);

      $consultaAdministrador->execute();
      $rowAdministrador = $consultaAdministrador->fetch(PDO::FETCH_ASSOC);
      $totalRowAdministrador = $consultaAdministrador ->rowCount();


      $consultaAluno = $conn->prepare("SELECT * FROM  tbl_aluno WHERE email=:email");
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
                popup: 'swalFireCadastroAdministrador',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        // Redirecione automaticamente após um breve atraso
        setTimeout(function() {
            window.location.href = 'cadastroAluno.php';
        }, 3000);
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
            window.location.href = 'cadastroAluno.php';
        }, 4000);
    </script>";

    }else{
      try{ 
        $sql = $conn->prepare("INSERT INTO tbl_aluno (id, nome, email, senha, periodo, sala, dataCadastro, recuperar_senha, situacao, condicao)
                            VALUES (:id, :nome, :email, :senha, :periodo, :sala, :dataCadastro, :recuperar_senha, :situacao, :condicao) ");
        
        $sql->bindValue(':id', null);   
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':sala', $sala);
        $sql->bindValue(':senha', $hash);
        $sql->bindValue(':periodo', $periodo);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':dataCadastro', $dataCadastro);
        $sql->bindValue(':recuperar_senha', null);
        $sql->bindValue(':situacao', $situacao );    
        $sql->bindValue(':condicao', "desbloqueado");  

        $sql->execute();
        $sql->execute();
        echo "<script>
            Swal.fire({
                title: 'Cadastro de aluno realizado com Sucesso!!',
                customClass: {
                    popup: 'swalFireCadastroAdministrador',
                },
                showCancelButton: false,
                confirmButtonText: 'Ir para a página de login',
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
}

    $conn;
    ?>
</body>

</html>