<?php
    require_once "include/header.php";
?>

    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/alterarAluno.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">
</head>

<body>

    <script>
    AOS.init();
    </script>
<?php
    require_once "../restrito.php";
    require_once "include/navbar.php";

    try{
    if(isset($_REQUEST["al"])) {
        
    $id = $_REQUEST["al"];
    $consulta = $conn->prepare("SELECT * FROM tbl_aluno where id=:id;");
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $row=$consulta -> fetch(PDO::FETCH_ASSOC);
    }
    
    }
    
    catch (PDOException $erro){
        echo $erro->getMessage();
    }
    ?>

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="alterarAluno.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Alterar Aluno</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control"
                            value="<?php if(isset($row['id'])) {echo $row['id'];} ?>" readonly="readonly"><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-mail Institucional</label>
                            <input type="text" name="email" class="form-control"
                            value="<?php if(isset($row['email'])) {echo $row['email'];} ?>" ><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo</label>
                            <input type="text" name="nome" class="form-control" value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                    <div class="form-group">
        <label for="sala" >Sala</label>
          <select id="sala" name="sala" class="form-control"
          value="<?php if(isset($row['sala'])) {echo $row['sala'];} ?>" id="sala">
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
            <option value="3º en med">3º ensino médio</option>
            <option value="segurança">Segurança do Trabalho</option>
            <option value="info">Informática para Internet</option>
            <option value="adm">Administração</option>
            <option value="qui">Química</option>

          </select> 
        </div> 
        </div> <br>


        <div class="col-md-6 offset-md-3">
                    <div class="form-group">
        <label for="periodo" >Periodo</label>
          <select id="periodo" name="periodo" class="form-control"
          value="<?php if(isset($row['periodo'])) {echo $row['periodo'];} ?>" id="periodo">
            <option value="manhã">manhã</option>
            <option value="tarde">tarde</option>
            <option value="noite">noite</option>
            <option value="integrado">integrado - manhã e tarde</option>
        
          </select> 
        </div> 
        </div> 
        <br>

        <div class="form-group">
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
            <br>

            <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                <label for="situacao">CONDIÇÃO</label>
                <select class="form-control" name="situacao" id="situacao">
                    <option value="1"
                        <?php if (isset($row['condicao']) && $row['condicao'] == "bloqueado") { echo 'selected'; } ?>>
                        bloqueado</option>
                    <option value="0"
                        <?php if (isset($row['condicao']) && $row['condicao'] == "desbloqueado") { echo 'selected'; } ?>>
                        desbloqueado</option>
                </select>
            </div>

        <br> <br>

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

        $id = $_REQUEST["id"];
      $nome = $_REQUEST["nome"];
      $email = $_REQUEST["email"];
      $senha = $_REQUEST["senha"];
      $periodo = $_REQUEST["periodo"];
      $sala = $_REQUEST["sala"];
      $dataCadastro = date("Y-m-d");
      $situacao = 1;
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
                popup: 'swalFireCadastroAdministrador',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        // Redirecione automaticamente após um breve atraso
        setTimeout(function() {
            window.location.href = 'controleDeAluno.php';
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
            window.location.href = 'controleDeAluno.php';
        }, 4000);
    </script>";

    }else{
      try{ 
        $sql = $conn->prepare("UPDATE tbl_aluno 
        SET nome = :nome, 
            email = :email, 
            senha = :senha, 
            periodo = :periodo, 
            sala = :sala, 
            dataCadastro = :dataCadastro, 
            recuperar_senha = :recuperar_senha, 
            situacao = :situacao, 
            condicao = :condicao 
        WHERE id = :id");
        
        $sql->bindValue(':id',  $id);   
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
        echo "<script>
            Swal.fire({
                title: 'Alteração realizado!!',
                customClass: {
                    popup: 'swalFireCadastroAluno',
                },
                showCancelButton: false, // Não mostrar o botão de cancelar
                confirmButtonText: 'Ir para controle de aluno',
                timer: 5000, 
                timerProgressBar: true, 
                allowOutsideClick: false      
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'controleDeAluno.php';
                }
            });
        </script>";

        
      } 
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    }

    $conn;}
    ?>
</body>

</html>