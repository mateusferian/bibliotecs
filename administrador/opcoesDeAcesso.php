
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs</title>

    <link href="../bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/opcoes.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logoWeb.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</head>

<body>
<?php
    require_once "protect.php";
?>

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3 form">
                <br><br>
                <h1 class="text-center">Onde você deseja ir?</h1>
                <br><br>

                <div class="form-group text-center">
                    <div class="mx-auto">
                        <input id="formulario" type="button" value="Cadastro de administrador" class="btn btn-primary"
                        onclick="direcionaParaCadastroAdministrador()">
                    </div>
                    <br>
                </div>

                <div class="form-group text-center">
                    <div class="mx-auto">
                        <input id="formulario" type="button" value="Controle de administrador" class="btn btn-primary" 
                        onclick="direcionaParaControleAdministrador()">
                    </div>
                    <br>
                </div>

                <div class="form-group text-center">
                    <div class="mx-auto">
                        <input id="formulario" type="button" value="Página de login" class="btn btn-primary"
                            onclick="direcionaParaLogin()">
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<script>
function direcionaParaCadastroAdministrador() {
    var bytes = new Uint8Array(7);
    window.crypto.getRandomValues(bytes);
    var valorPermitido = Array.from(bytes).map(byte => ('0' + (byte & 0xFF).toString(16)).slice(-2)).join('');
    window.location.href = 'cadastroAdministrador.php?protect=' + encodeURIComponent(valorPermitido);
}

function direcionaParaLogin() {
    window.location.href = '../index.php';
}

function direcionaParaControleAdministrador() {
    var bytes = new Uint8Array(7);
    window.crypto.getRandomValues(bytes);
    var valorPermitido = Array.from(bytes).map(byte => ('0' + (byte & 0xFF).toString(16)).slice(-2)).join('');
    window.location.href = 'controleDeAdministrador.php?protect=' + encodeURIComponent(valorPermitido);
}
</script>