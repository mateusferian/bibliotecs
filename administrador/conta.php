<?php
    require_once "include/header.php";
?>

<link rel="stylesheet" href="css/formulario.css">
<link rel="stylesheet" href="css/conta.css">
<link rel="stylesheet" href="css/swalFire.css">
<link rel="stylesheet" href="css/botao.css">

<style>
    #formulario {
        width: 100%;
    }
</style>
</head>

<body>
    <?php
    require_once "../restrito.php";
    require_once "include/navbar.php"
    ?>
    <script>
    AOS.init();
    </script>

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="form">
                    <br><br>
                    <h1 class="text-center">Conta</h1>
                    <br>

                    <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="testimonial-wrap d-flex justify-content-center align-items-center">
                <div class="testimonial-item border rounded-circle">
                    <div class="testimonial-img-wrap overflow-hidden">

                            
                             $caminho_imagem = $_SESSION['arquivo'] ?? '../assets/img/imagensProfessores/user.png'; -->
                        
                        <!-- <img src="" class="testimonial-img img-fluid rounded-circle" alt=""> -->
                 <!--   </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

                    <br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <p class="custom-text"><?php echo $_SESSION["nome"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <p class="custom-text fs-10 text-center mt-10"><?php echo $_SESSION["email"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
    <div class="col-md-6 offset-md-3">
        <div class="card custom-card">
                <form action="sair.php" method="post">
                    <button type="submit" class="btn btn-primary text-center card-body" id="formulario">
                        Sair
                    </button>
                </form>
        </div>
    </div>
</div>
<br><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>