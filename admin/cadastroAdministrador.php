<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastroAdministrador.css">
     <!-- links apra mostrar o  Swal.fire( -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!--<div class="form-group d-flex justify-content-center">
    <img src="http://placeskull.com/100/100" width="100px" alt="Fuzzy Cardigan"
class="img-thumbnail img-responsive"  >
</div> -->

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
                            <input type="text" name="senha" class="form-control" placeholder="digite a sua senha"
                                required="">
                        </div>
                    </div>
                    <a class="form-links" href="index.php">Já tenho uma conta</a>
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

    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
    // Inicializa o AOS para ativar os efeitos na rolagem
    AOS.init();
    </script>

    <?php
    //chamar o arquivo de conexão
    require_once "conexao.php";

    //verifica o botão enviar
    if (isset($_REQUEST["Cadastra-se"])) {
      //se o botao nao estiver vazio receba os dados do formulario
      $nome = $_REQUEST["nome"];
      $email = $_REQUEST["email"];
      $senha = $_REQUEST["senha"];
      $tipo = 2;
      $dataCadastro = date("Y-m-d");
      $hash = password_hash($senha, PASSWORD_DEFAULT);

      //inicio da gravação de dados na tabela do banco de dados
      try{ //tente executar
        //variavel com os dados de gravação na tabela
        $sql = $conn->prepare("INSERT INTO tbl_administrador (id, nome, email, senha ,tipo,dataCadastro)
                            VALUES (:id, :nome, :email, :senha, :tipo, :dataCadastro) ");
        
        //passagem de parametros para a tabela
        $sql->bindValue(':id', null);   
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $hash);
        $sql->bindValue(':tipo', $tipo);
        $sql->bindValue(':dataCadastro', $dataCadastro);

        //execução da query de inserção
        $sql->execute();
        //msg caso não ocorra erro
        echo "<script>
            Swal.fire({
                title: 'Cadastro com Sucesso!!',
                html: '<p>Para evitar riscos de senha incorreta, pedimos para selecionar \"Lembre de mim\" na página de login.</p>',
                customClass: {
                    popup: 'swalFireCadastroAdministrador', // Classe CSS personalizada para a caixa de diálogo
                },
                showCancelButton: false, // Não mostrar o botão de cancelar
                confirmButtonText: 'Ir para a página de login',
                timer: 5000, // Defina o temporizador para 5 segundos (5000 milissegundos)
                timerProgressBar: true, // Mostrar a barra de progresso do temporizador
                allowOutsideClick: false      
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirecionar para a página de login
                    window.location.href = '../index.php';
                }
            });
        </script>";

        
      } // caso não executar captura o erro no sgbd
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    }

    //fecha conexao
    $conn;
    ?>
</body>

</html>