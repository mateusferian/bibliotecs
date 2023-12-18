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
    <link rel="stylesheet" href="css/paginaProtegida.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logoWeb.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</head>

<style>
    input[type="password"]::placeholder {
        color: #99cdc7 !important; /* Substitua essa cor pelo código ou nome da cor desejada */
    }
    </style>

<body>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="verificarSenha.php" method="POST">
                    <br><br>
                    <h1 class="text-center">Código de acesso</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Código</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite o código de acesso" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 offset-md-5">
                            <input  id="formulario" type="submit" value="Enviar código" class="btn btn-primary">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    if (isset($_GET["erro"])) {
    $valor_recebido = urldecode($_GET["erro"]);

    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'você nâo tem acesso!',
        customClass: {
            popup: 'swalFireCadastroAdministrador',
        },
        showCancelButton: false, 
        confirmButtonText: 'Ir para a página de login',
        timer: 4000, 
        timerProgressBar: true, 
        allowOutsideClick: false      
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../index.php';
        }
    });
</script>";
}
?>

</body>
</html>