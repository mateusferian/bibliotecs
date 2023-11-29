<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs</title>

    <link href="bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="login/css/index.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link href="login/css/botao.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logoWeb.png">
</head>

<body>
<style>
    .login{
        color: #fff;
    }
</style>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-7">
                <!-- Changed offset to 6 to move the form to the right -->
                <form class="form" action="login/login.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center login">Login</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label class="login">E-MAIL</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Digite o seu e-mail" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label class="login">Senha</label>
                            <input type="password" name="senha" class="form-control" 
                                required="">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">

                        <div class="align-vertical">
                            <a href="login/esqueciSenha.php" class="form-links">Esqueci minha senha</a>
                        </div>
                        <div class="align-vertical">
                            <a href="login/cadastroAluno.php" class="form-links">Não tem uma conta? cadastre-se</a>
                        </div>
                    </div>


                    <br><br>

                    <div class="form-group">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" value="Entrar" class="btn" name="acessar" id="formulario">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    if (isset($_GET["erro"])) { 

                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Email ou senha incorretos!',
                    customClass: {
                        popup: 'swalFireIndex',
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false  
                });
        
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 4000);
            </script>";
}

if (isset($_GET["inativo"])) { 

                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Usuario inativo!',
                    customClass: {
                        popup: 'swalFireIndex',
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false  
                });
        
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 4000);
            </script>";
}
?>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
    AOS.init();
    </script>
</body>

</html>