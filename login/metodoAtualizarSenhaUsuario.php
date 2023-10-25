<?php
$rowUsuario = $resultadoUsuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['SendNovaSenha'])) {
                $senhaUsuario = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $chaveRecuperarSenhaUsuario = 'NULL';

                $queryUpUsuario = "UPDATE tbl_aluno 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $resultadoUpUsuario = $conn->prepare($queryUpUsuario);
                $resultadoUpUsuario->bindParam(':senha', $senhaUsuario, PDO::PARAM_STR);
                $resultadoUpUsuario->bindParam(':recuperar_senha', $chaveRecuperarSenhaUsuario);
                $resultadoUpUsuario->bindParam(':id', $rowUsuario['id'], PDO::PARAM_INT);

                if ($resultadoUpUsuario->execute()) {
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
            
                    setTimeout(function() {
                        window.location.href = '../index.php';
                    }, 3000);
                </script>";
                
                 }
                }
                ?>
