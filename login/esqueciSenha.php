<?php
ob_start();
include_once '../conexao.php';
include_once 'include/header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .login{
        color: #fff;
    }

    body {
    background-image: url(img/esqueciSenha.jpg);
    }
</style>
<body>
    <?php

if (isset($_GET["erro"])) { 
    $valor_recebido = urldecode($_GET["erro"]);

                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Link inválido',
                    html: '<p>solicite um novo link para atualizar a senha!!</p>',
                    customClass: {
                        popup: 'swalFireIndex',
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false  
                });
        
                setTimeout(function() {
                    window.location.href = 'esqueciSenha.php';
                }, 5000);
            </script>";
}

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {

        $email = $dados['email'];

        $query_email_aluno = "SELECT id, nome, email FROM tbl_aluno WHERE email = :email LIMIT 1";
        $result_email_aluno = $conn->prepare($query_email_aluno);
        $result_email_aluno->bindParam(':email', $email, PDO::PARAM_STR);
        $result_email_aluno->execute();
        
        if ($result_email_aluno->rowCount() > 0) {

            $row_email = $result_email_aluno->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_email['id'], PASSWORD_DEFAULT);

            $query_update_aluno = "UPDATE tbl_aluno SET recuperar_senha = :recuperar_senha WHERE id = :id LIMIT 1";
            $result_update_aluno = $conn->prepare($query_update_aluno);
            $result_update_aluno->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_update_aluno->bindParam(':id', $row_email['id'], PDO::PARAM_INT);
            $result_update_aluno->execute();
        
            $link = "http://localhost/tcc-library/login/atualizarSenha.php?chave=$chave_recuperar_senha";

        } else {

            $query_email_admin = "SELECT id, nome, email FROM tbl_administrador WHERE email = :email LIMIT 1";
            $result_email_admin = $conn->prepare($query_email_admin);
            $result_email_admin->bindParam(':email', $email, PDO::PARAM_STR);
            $result_email_admin->execute();
        
            if ($result_email_admin->rowCount() > 0) {
                $row_email = $result_email_admin->fetch(PDO::FETCH_ASSOC);
                $chave_recuperar_senha = password_hash($row_email['id'], PASSWORD_DEFAULT);

                $query_update_admin = "UPDATE tbl_administrador SET recuperar_senha = :recuperar_senha WHERE id = :id LIMIT 1";
                $result_update_admin = $conn->prepare($query_update_admin);
                $result_update_admin->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
                $result_update_admin->bindParam(':id', $row_email['id'], PDO::PARAM_INT);
                $result_update_admin->execute();
        
                $link = "http://localhost/tcc-library/login/atualizarSenha.php?chave=$chave_recuperar_senha";

            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Usuário não encontrado!',
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
        
        $link = "http://localhost/tcc-library/login/atualizarSenha.php?chave=$chave_recuperar_senha";
        
        try {

            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'bibliotecs@outlook.com';
            $mail->Password   = 'bibliotec123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
        
            $mail->setFrom('bibliotecs@outlook.com', 'Atendimento Bibliotecs');
            $mail->addAddress($row_email['email'], $row_email['nome']);
        
            $mail->isHTML(true);                                  
            $mail->Subject = 'Recuperar senha';
            $mail->Body    = 'Prezado(a) ' . $row_email['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
            $mail->AltBody = 'Prezado(a) ' . $row_email['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";
        
            $mail->send();

                    $_SESSION['msg'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Email enviado com Sucesso!!',
                    html: '<p>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>',
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

                } catch (Exception $e) {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email nâo enviado',
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
    ?>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" method="POST" action="">
                    <br><br>
                    <h1 class="text-center login">Esqueci Senha</h1>
                    <?php
        $email = "";
        if (isset($dados['email'])) {
            $email = $dados['email'];
        } ?>
                    <br><br>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label class="login">E-mail</label>
                            <input type="text" name="email" placeholder="Digite o usuário"
                                value="<?php echo $email; ?>"><br><br>
                        </div>
                    </div>
                    <a class="form-links" href="../index.php"> lembrou? clique aqui e vá apra a area de login</a>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" value="Recuperar" class="btn btn-primary" name="SendRecupSenha">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>