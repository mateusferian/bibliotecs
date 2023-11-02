<?php
    require_once "include/header.php";
?>

<script src="js/estrela.js"></script>

<style>
.img_novidades {
    max-width: 80%;
    height: auto;
}

.img_tamanho {
    max-width: 300px;
    height: auto;
}
</style>
</head>

<body>



    <?php
    require_once "include/navbar.php";
    require_once "include/hero.php";
?>

    <!--Novidades -->
    <section id="destaques" class="container">
        <p class="fs-1 text-center mt-5">Destaques</p>

        <?php
  include 'funcoes/funcoes.php';

  exibirLivrosPaginados($conn, 'S', "destaque"); // Exibe os livros não-novidades
  ?>
    </section>



    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Comentários:</h2>
                <p>Encontre inspiração nas opniões dos leitores apaixonados e junte-se à nossa comunidade literaria,<br>
                    onde cada livro é uma aventura esperando para ser vivida</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials/testimonials-1.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Eduardo Rossi</h3>
                                        <h4> Professor</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    O site da biblioteca é incrivelmente útil! É fácil de navegar e encontrar
                                    informações atualizadas sobre os eventos,
                                    horários de funcionamento e até mesmo sobre o acervo de livros disponíveis. Um
                                    recurso essencial para qualquer amante da leitura!
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/img/testimonials/testimonials-2.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Paola Silva</h3>
                                        <h4>Aluna</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Achei o site da biblioteca extremamente conveniente. Ele oferece a opção de fazer
                                    reservas online para retirada de livros, o que economiza muito tempo.
                                    Além disso, a seção de recomendações de leitura me ajudou a descobrir novos títulos
                                    interessantes.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/img/testimonials/testimonials-3.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Michele Bird</h3>
                                        <h4>Professora</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Estou realmente satisfeita com o site da biblioteca! A variedade de livros
                                    disponíveis é incrível, com opções para todos os gostos e gêneros.
                                    A interface é intuitiva e fácil de usar, permitindo uma busca rápida e precisa.
                                    Nunca mais vou ficar sem leitura com essa biblioteca online!
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/img/testimonials/testimonials-4.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Alberto Soares </h3>
                                        <h4>Aluno</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    O site da biblioteca é uma fonte de conhecimento! Além de fornecer acesso ao
                                    catálogo completo de livros, encontrei clássicos que sempre desejei ler e títulos
                                    contemporâneos que ainda nem tinha ouvido falar.
                                    O sistema de reserva online facilita minha vida, sem precisar me preocupar em passar
                                    horas na biblioteca procurando livros. Já sou um fã fiel!
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/img/testimonials/testimonials-5.jpg"
                                        class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Robson Fernandes</h3>
                                        <h4>Professor</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    O site da biblioteca é uma ótima ferramenta para qualquer pessoa interessada em
                                    praticidade.
                                    Além de fornecer informações sobre cada livro, ele também oferece a opção de
                                    reserva-los,
                                    o que é perfeito para estudantes com rotinas agitadas. Uma maravilhosa extensão da
                                    biblioteca física!

                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->



    <!--Produtos -->
    <section id="livros" class="container">
        <p class="fs-1 text-center">Livros</p>

        <!-- Linha 1 - Produtos -->
        <?php
  exibirLivrosPaginados($conn, 'N',"livros"); // Exibe os livros não-novidades
  ?>
    </section>





    </section>

    <?php
function exibirLivrosPaginados($conn, $destaque,$secaoId) {
  $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE destaque = :destaque");
  $consulta->bindParam(':destaque', $destaque);
  $consulta->execute();
  $livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
  $totalLivros = count($livros);
  $livrosPorPagina = 3; // Número de livros por página
  $totalPaginas = ceil($totalLivros / $livrosPorPagina);

  // Obtém o número da página atual da URL
  $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

  // Calcula o índice inicial dos livros da página atual
  $indiceInicial = ($paginaAtual - 1) * $livrosPorPagina;

  // Exibe os livros em uma linha
  echo '<div class="row text-center mt-5">';
  for ($i = $indiceInicial; $i < min($indiceInicial + $livrosPorPagina, $totalLivros); $i++) {
    ?>
    <div class="col-sm-4 mt-5">
        <img src="<?php echo $livros[$i]["arquivo"]?>" class="card-img-top img_tamanho"
            alt="<?php echo $livros[$i]["nome"]?>">
        <h5 class="card-title"><?php echo $livros[$i]["nome"]?></h5>

        <?php
      $media_avaliacoes = $livros[$i]["destaque"];
      mediaEstrelasDeAvaliacao($media_avaliacoes);
      ?>
        <p><a href="detalhes.php?id_liv=<?php echo $livros[$i]['id_liv']?>" class="btn" id="botao">Ver</a></p>
    </div>
    <?php
  }
  echo '</div>';
  $secaoIdParam = $secaoId ? "&SECAO=$secaoId" : '';
  // Exibe a paginação
  ?>
    <br> <br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center custom-pagination">
            <?php
    for ($pagina = 1; $pagina <= $totalPaginas; $pagina++) {
      $activeClass = $pagina == $paginaAtual ? 'active' : '';
      echo "<li class='page-item $activeClass'><a class='page-link' href='?pagina=$pagina$secaoIdParam'>$pagina</a></li>";
    }
    ?>
        </ul>
    </nav>

    <script>
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const targetSection = urlParams.get('SECAO'); // Usando o novo parâmetro "SECAO"
        if (targetSection) {
            const sectionElement = document.getElementById(targetSection);
            if (sectionElement) {
                sectionElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    };
    </script>

    <?php
}
?>




    <!-- duvidas frequentes  -->
    <section id="Ajuda" class="faq">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="content px-xl-5">
                        <h3> Otimize Sua Experiência na <strong>Bibliotecs</strong></h3>
                        <p>
                            Nossa seção de Perguntas Frequentes foi criada para agilizar suas buscas.
                            Seja você um estudante, professor ou amante da leitura, encontrará respostas úteis aqui.
                            Economize tempo e aproveite ao máximo sua visita!
                        </p>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    <span class="num">1.</span>
                                    Sobre Nossa Biblioteca de Reservas
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Bem-vindo à nossa Biblioteca de Reservas, o seu refúgio literário onde as páginas
                                    ganham vida e as histórias se desdobram. Nós nos dedicamos a conectar os amantes da
                                    leitura com os tesouros literários que aguardam ser explorados.<br><br>
                                    Nossa plataforma de reserva de livros oferece uma experiência simples e conveniente,
                                    permitindo que você mergulhe em uma vasta coleção de títulos emocionantes, desde
                                    clássicos atemporais até as mais recentes aventuras literárias. Com um clique, você
                                    pode reservar o livro que deseja e embarcar em uma jornada através das
                                    palavras.<br><br>
                                    Nossa missão é promover o amor pela leitura e fortalecer a comunidade de leitores.
                                    Acreditamos que cada livro reserva um mundo único para ser descoberto, e estamos
                                    aqui para facilitar essa jornada. Além disso, estamos comprometidos em fornecer um
                                    serviço excepcional, garantindo que sua experiência conosco seja suave e
                                    enriquecedora.<br><br>
                                    Fique à vontade para explorar nossa biblioteca virtual, reservar seus livros
                                    favoritos e compartilhar suas descobertas literárias com amigos e familiares.
                                    Juntos, podemos criar um espaço onde as histórias continuam a inspirar, ensinar e
                                    entrelaçar nossas vidas.<br><br>
                                    Agradecemos por escolher a bibliotecs como seu destino literário. Prepare-se para
                                    embarcar em aventuras inesquecíveis, página por página.<br><br>
                                    Leia, explore, sonhe.<br><br>
                                    Equipe da Bibliotecs
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    <span class="num">2.</span>
                                    Quanto tempo o leitor poderá ficar com o livro reservado?
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    O leitor podera ficar com o livro reservado com duração de uma semana, após essa
                                    semana poderá renovar por mais uma semana.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    <span class="num">3.</span>
                                    Como faço para reservar um livro em um site?
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                Ao navegar na página inicial, a pessoa escolhe o livro que deseja e clica em 'Ver'. Isso a direciona para a página de informações específicas do livro. Nessa página, ela pode clicar no botão 'Reservar' 
                                para garantir o livro. Após a reserva ser concluída com sucesso, a pessoa poderá retirar o livro na escola.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-4">
                                    <span class="num">4.</span>
                                    Quais são os motivos mais comuns para ser bloqueado de fazer reservas no site da escola?
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                o motivo mais comum para ser bloqueado de fazer reservas no site da escola estão frequentemente 
                                relacionados ao comportamento do usuário e ao cumprimento das políticas da biblioteca da escola.
                                 Um dos motivos comuns pode ser relacionado à demora na devolução de livros
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-5">
                                    <span class="num">5.</span>
                                    ficou mais alguma duvida? entre em contato:
                                </button>
                            </h3>
                            <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Caso houver dúvidas sobre o uso do site,
                                    entre em contato

                                    <p> telefone (**) ***** - ****</p>
                                    <p> telefone (**) ***** - ****</p>
                                    <p> telefone (**) ***** - ****</p>
                                    <p> ou </p>

                                    <a href="email.html">email@bibliotecs.com</a>
                                    <p><a href="email.html">email@bibliotecs.com</a></p>
                                    <p><a href="email.html">email@bibliotecs.com</a></p>
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->


    <section id="livrosPDF" class="container">
        <p class="fs-1 text-center">Livros em PDF</p>
        <?php
  exibirLivrosPaginados($conn, 'S', "destaque"); 
  ?>
    </section>
    </div>


    <?php
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>

</body>

</html>