<?php
include_once '../conexao.php';
include_once 'include/header.php';
?>
<style>
    .login{
        color: #fff;
    }
    
    body {
    background-image: url(img/atualizarSenha.jpg);
    }

    input[type="password"]::placeholder {
        color: #99cdc7 !important; /* Substitua essa cor pelo código ou nome da cor desejada */
    }
</style>

    <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {
        //var_dump($chave);

        $queryAdministrador = "SELECT id 
                            FROM tbl_administrador 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $resultadoAdministrador = $conn->prepare($queryAdministrador);
        $resultadoAdministrador->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $resultadoAdministrador->execute();



        $queryUsuario = "SELECT id 
        FROM tbl_aluno 
        WHERE recuperar_senha =:recuperar_senha  
        LIMIT 1";
        $resultadoUsuario = $conn->prepare($queryUsuario);
        $resultadoUsuario->bindParam(':recuperar_senha', $chave, PDO::  PARAM_STR);
        $resultadoUsuario->execute();

        if (($resultadoAdministrador) and ($resultadoAdministrador->rowCount() != 0)) {         
            include_once 'metodoAtualizarSenhaAdministrador.php';     

        }else if (($resultadoUsuario) and ($resultadoUsuario->rowCount() != 0)) {       
            include_once 'metodoAtualizarSenhaUsuario.php';

        }else {
            $bytes = random_bytes(7);
            $valorErro = bin2hex($bytes);

            header("Location: esqueciSenha.php?erro=" . urlencode($valorErro));
            exit;
        }
    } else {
        $bytes = random_bytes(7);
        $valorErro = bin2hex($bytes);

        header("Location: esqueciSenha.php?erro=" . urlencode($valorErro));
        exit;
    }

    ?>

<div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out" data-aos-delay="100">
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <form class="form" method="POST" action="">
                <br><br>
                <h1 class="text-center login">Atualizar Senha</h1>
                <?php
        $email = "";
        if (isset($dados['senha'])) {
            $email = $dados['senha'];
        } ?>
                <br><br>
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <label class="login">Senha</label>
                        <input type="password" name="senha" placeholder="Digite a nova senha"
                            value="<?php echo $email; ?>"><br><br>
                    </div>
                </div>
                <a class="form-links" href="../index.php"> lembrou? clique aqui e vá apra a area de login</a>
                    <br><br>
                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <input id="formulario" type="submit" value="Atualizar" class="btn" name="SendNovaSenha">
                    </div>
                    <br><br>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>