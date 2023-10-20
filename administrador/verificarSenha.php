<?php
// Defina a senha que será comparada (substitua pela sua senha real)
$senha_correta = "3dsetec";

// Verifique se a senha foi enviada por POST
if (isset($_POST["senha"])) {
    $senha_inserida = $_POST["senha"];

    // Verifique se a senha inserida coincide com a senha correta
    if ($senha_inserida == $senha_correta) {
        // Senha correta, redirecione para a página protegida
        header("Location: cadastroAdministrador.php?protect=2");
        exit();
    } else {
        // Senha incorreta, exiba uma mensagem de erro
        echo "Senha incorreta. Tente novamente.";
    }
}
?>
