<?php
ob_start();
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

        $query_email_aluno = "SELECT id 
                            FROM tbl_aluno 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_email_aluno = $conn->prepare($query_email_aluno);
        $result_email_aluno->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_email_aluno->execute();

        $query_email_admin = "SELECT id 
        FROM tbl_administrador 
        WHERE recuperar_senha =:recuperar_senha  
        LIMIT 1";
        $result_email_admin = $conn->prepare($query_email_admin);
        $result_email_admin->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_email_admin->execute();

        if ($result_email_aluno->rowCount() > 0) {
        if (($result_email_aluno) and ($result_email_aluno->rowCount() != 0)) {
            $row_email = $result_email_aluno->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['SendNovaSenha'])) {
                $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_email = "UPDATE tbl_aluno 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_email = $conn->prepare($query_up_email);
                $result_up_email->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result_up_email->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_email->bindParam(':id', $row_email['id'], PDO::PARAM_INT);
                if ($result_up_email->execute()) {

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

            exit;
                
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
                    }, 3000); // Tempo em milissegundos (2 segundos no exemplo) antes de redirecionar
                </script>";
                }
            }

            
        } else {

            echo "<script>
            Swal.fire({0
                icon: 'error',
                title: 'Link inválido, solicite novo link para atualizar a senha!',
                customClass: {
                    popup: 'swalFireIndex',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirecione automaticamente após um breve atraso
            setTimeout(function() {
                window.location.href = 'esqueciSenha.php';
            }, 3000); // Tempo em milissegundos (2 segundos no exemplo) antes de redirecionar
        </script>";
        }
    }

    else if($result_email_admin->rowCount() > 0){
        if (($result_email_admin) and ($result_email_admin->rowCount() != 0)) {
            $row_email = $result_email_admin->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['SendNovaSenha'])) {
                $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_email = "UPDATE tbl_administrador 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_email = $conn->prepare($query_up_email);
                $result_up_email->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result_up_email->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_email->bindParam(':id', $row_email['id'], PDO::PARAM_INT);
                if ($result_up_email->execute()) {

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

            exit;
                
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

            echo "<script>
            Swal.fire({0
                icon: 'error',
                title: 'Link inválido, solicite novo link para atualizar a senha!',
                customClass: {
                    popup: 'swalFireIndex',
                },
                showConfirmButton: false,
                allowOutsideClick: false  
            });
    
            // Redirecione automaticamente após um breve atraso
            setTimeout(function() {
                window.location.href = 'esqueciSenha.php';
            }, 3000);
        </script>";
        }
    }
    
    } else {

        echo "<script>
        Swal.fire({
            icon: 'error',
            title: Link inválido, solicite novo link para atualizar a senha!',
            customClass: {
                popup: 'swalFireIndex',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        // Redirecione automaticamente após um breve atraso
        setTimeout(function() {
            window.location.href = 'esqueciSenha.php';
        }, 3000);
    </script>";

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