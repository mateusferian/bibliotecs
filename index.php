<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs login de usuarios</title>

    <!--Bootstrap -->
    <link href="bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/botao.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--<div class="form-group d-flex justify-content-center">
    <img src="http://placeskull.com/100/100" width="100px" alt="Fuzzy Cardigan"
class="img-thumbnail img-responsive"  >
</div> -->

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-7">
                <!-- Changed offset to 6 to move the form to the right -->
                <form class="form" action="login.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Login</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-MAIL INSTITUCIONAL</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="digite o seu e-mail institucional" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Senha</label>
                            <input type="text" name="senha" class="form-control" placeholder="digite a sua senha"
                                required="">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <div class="align-vertical">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lembrar">
                                <label class="form-check-label" for="lembrar">lembre de mim</label>
                            </div>
                        </div>
                        <div class="align-vertical">
                            <a href="#" class="form-links">Esqueci minha senha</a>
                        </div>
                        <div class="align-vertical">
                            <a href="cadastroUsuario.php" class="form-links">Não tem uma conta? cadastre-se</a>
                        </div>
                    </div>


                    <br><br>

                    <div class="form-group">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" value="Entrar" class="btn btn-primary" name="acessar" id="meuBotao">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
    // Inicializa o AOS para ativar os efeitos na rolagem
    AOS.init();
    </script>
</body>

</html>