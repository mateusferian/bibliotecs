<?php

$rowAdministrador = $resultadoAdministrador->fetch(PDO::FETCH_ASSOC);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['SendNovaSenha'])) {
    $senhaAdministrador = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $chaveRecuperarSenhaAdministrador = 'NULL';

    $queryUpAdministrador = "UPDATE tbl_administrador 
            SET senha =:senha,
            recuperar_senha =:recuperar_senha
            WHERE id =:id 
            LIMIT 1";
    $resultadoUpAdministrador = $conn->prepare($queryUpAdministrador);
    $resultadoUpAdministrador->bindParam(':senha', $senhaAdministrador, PDO::PARAM_STR);
    $resultadoUpAdministrador->bindParam(':recuperar_senha', $chaveRecuperarSenhaAdministrador);
    $resultadoUpAdministrador->bindParam(':id', $rowAdministrador['id'], PDO::PARAM_INT);

    if ($resultadoUpAdministrador->execute()) {
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
        }, 4000);
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
        }, 4000);
    </script>";
    
     }
}


?>