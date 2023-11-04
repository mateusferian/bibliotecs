<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
$senha_correta = "3dsetec";

if (isset($_POST["senha"])) {
    $senha_inserida = $_POST["senha"];

    if ($senha_inserida == $senha_correta) {
        $bytes = random_bytes(7);
        $valorPermitido = bin2hex($bytes);
        header("Location: opcoesDeAcesso.php?protect=" . urlencode($valorPermitido));
        exit();
    } else {
        $bytes = random_bytes(7);
        $valorErro = bin2hex($bytes);
        header("Location: paginaprotegida.php?erro=" . urlencode($valorErro));
        exit;
    exit;
    }
} else{
    $bytes = random_bytes(7);
    $valorErro = bin2hex($bytes);
    header("Location: paginaprotegida.php?erro=" . urlencode($valorErro));
    exit;
}
?>
