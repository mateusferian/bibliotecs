<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de usuarios</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
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
                <form class="form" action="form.php" method="POST" name="formulario">
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
                    <a class = "form-links" href="index.html">Já tenho uma conta</a>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-4 offset-md-4">
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


      //inicio da gravação de dados na tabela do banco de dados
      try{ //tente executar
        //variavel com os dados de gravação na tabela
        $sql = $conn->prepare("INSERT INTO tbl_cadastro_usuario (id, nome, email, senha)
                            VALUES (:id, :nome, :email, :senha) ");
        
        //passagem de parametros para a tabela
        $sql->bindValue(':id', null);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);

        //execução da query de inserção
        $sql->execute();
        //msg caso não ocorra erro
        echo "<script language=javascript>
        alert('Dados gravados com Sucesso !!');
        location.href = 'form.php';
        </script>";
      } // caso não executar captura o erro no sgbd
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    }

    //fecha conexao
    $conn;
    ?>

<h1>Consultar</h1>
    <table border="1">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">email</th>
      <th scope="col">senha</th>
  </tr>
  <?php
  try{
     $consulta = $conn->prepare("SELECT * FROM tbl_cadastro_usuario");
     $consulta->execute();

     while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
  ?>
       <tr>
        <td><?php echo $row["id"] ?> </td>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["senha"] ?></td>
        <td>
          <a href="alterar.php?al=<?php echo $row["id"]; ?>">Alterar</a>
          <a href="form.php?ex=<?php echo $row["id"]; ?>">Excluir</a>
       </td>
    </tr>
  <?php
     }
     }catch(PDOException $erro){
       echo $erro->getMessage();
     }
  ?>
    </table>
    <?php
    try{
    if(isset($_REQUEST["ex"])){
      $idUsuario = $_REQUEST["ex"];
      $delete = $conn->prepare("DELETE FROM tbl_cadastro_usuario WHERE id=:id");
      $delete->bindValue(':id',$idUsuario);
      $delete ->execute();

      echo "<script language=javascript>
      alert('Dados excluidos com Sucesso !!');
      location.href = 'form.php';
      </script>";
     }  
    }catch(PDOException $erro){
      echo $erro->getMessage();
    }
     $conn;
     ?>
</body>

</html>
