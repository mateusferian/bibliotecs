<?php
    require_once "include/header.php";
?>
</head>

<body>
<?php
    $nomeDaPagina ="Doações";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
    ?>

        <div class="container mt-4">
        <div class="card">
            <div class="card-body">

                <!-- Your provided HTML content here -->
                <section class="sample-page">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-12 order-1 order-lg-2">
                                <h1>| Informações para as doações</h1>
                                <p class="fw-light">Não se esqueça de verificar a <mark>qualidade </mark> dos livros doados.</br> Não dê para os outros o que <mark>não gostaria de receber.</mark></p></br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 order-1 order-lg-2">
                                <h1>| Como doar?</h1>
                                <p class="fw-light">Contate um dos administradores da nossa biblioteca presencial (contatos abaixo) e informe-os sobre sua doação.</br>Após comunicar os administradores, marque um horário para entregar o livro físico</p></br></br></br></br>
                                <h1>| Endereço e Contatos </h1>
                                </br>
                                <p class="fw-light">Avenida Alexandre Carlos de Melo, 18 - Jardim Aeroporto </br>
                                    bibliotecs@gmail.com </br> +19 99599-3251 </br> +19 998744-8766 </br> +19 3681-3378</p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2">
                                <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
<br>
    </main>
    <?php

  require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>
</body>

</html>