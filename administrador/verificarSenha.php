<?php
$senha_correta = "3dsetec";

if (isset($_POST["senha"])) {
    $senha_inserida = $_POST["senha"];

    if ($senha_inserida == $senha_correta) {
        header("Location: cadastroAdministrador.php?protect=2");
        exit();
    } else {
        // Senha incorreta, exiba uma mensagem de erro
        echo "Senha incorreta. Tente novamente.";
    }
}
?>
