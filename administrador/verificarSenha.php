<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
$senha_correta = "3dsetec";

if (isset($_POST["senha"])) {
    $senha_inserida = $_POST["senha"];

    if ($senha_inserida == $senha_correta) {
        header("Location: cadastroAdministrador.php?protect=2");
        exit();
    } else {
        $valor_para_enviar = "erro";
        header("Location: paginaprotegida.php?alerta_valor=" . urlencode($valor_para_enviar));
        exit;
    exit;
    }
}
?>
