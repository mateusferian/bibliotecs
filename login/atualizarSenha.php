<?php
include_once 'conexao.php';
include_once 'include/header.php';
?>
<style>
    .login{
        color: #fff;
    }
    
    body {
    background-image: url(img/atualizarSenha.jpg);
    }
</style>

    <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {
        //var_dump($chave);

        $query_usuario = "SELECT id 
                            FROM tbl_administrador 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados);
            if (!empty($dados['SendNovaSenha'])) {
                $senha_usuario = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_usuario = "UPDATE tbl_administrador 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_usuario = $conn->prepare($query_up_usuario);
                $result_up_usuario->bindParam(':senha', $senha_usuario, PDO::PARAM_STR);
                $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                if ($result_up_usuario->execute()) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Senha atualizada com sucesso!',
                        customClass: {
                            popup: 'swalFireIndex',
                        },
                        showConfirmButton: false,
                        allowOutsideClick: false  
                    });
            
                    // Redirecione automaticamente após um breve atraso
                    setTimeout(function() {
                        window.location.href = '../index.php';
                    }, 3000);
                </script>";

                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Erro: Tente novamente!',
                        customClass: {
                            popup: 'swalFireIndex',
                        },
                        showConfirmButton: false,
                        allowOutsideClick: false  
                    });
            
                    // Redirecione automaticamente após um breve atraso
                    setTimeout(function() {
                        window.location.href = '../index.php';
                    }, 3000);
                </script>";
                
                 }
            }
        } else {
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
                        <input type="submit" value="Atualizar" class="btn btn-primary" name="SendNovaSenha">
                    </div>
                    <br><br>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>