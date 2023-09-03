<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bibliotecs-home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <!--Bootstrap -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <script src = "js/bootstrap.min.js"> </script>
  <script src="script.js"></script>
  
<link rel="icon" type="image/png" sizes="16x16"  href="imagens/favicon-16x16.png">

<style>
  .img_novidades{
    max-width: 80%;
    height: auto;
  }

  .img_tamanho{
    max-width: 300px;
    height: auto;
  }

  
  

</style>


  <!-- =======================================================
  * Template Name: Impact
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Bibliotecs<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#livros">Livros</a></li>
          <li><a href="#Ajuda"> Ajuda</a></li>
          <li><a href="blog.html">Horarios</a></li>
          <li><a href="#team">Doação</a></li>
          <li><a href="#livrosPDF">Livros em PDF</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  
          

  <!-- ======= Hero Section ======= -->
  
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Bem-Vindo a <span>Bibliotecs</span></h2>
          <p>Desvende mundos, inspire-se e deixe sua imaginação voar com nossos livros cuidadosamente selecionados. Retire um livro hoje e comece uma aventura que só os livros podem oferecer. Bem-vindo à nossa biblioteca online, onde cada página é uma descoberta</p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>
    </div>

    <?php
      
    ?>
  </section>

   <!--Novidades --> 
   <section id="novidades" class="container">
  <p class="fs-1 text-center mt-5">Destaques</p>

  <?php
  require_once "conexao.php";
  include 'funcoes/funcoes.php';

  exibirLivrosPaginados($conn, 's', "novidades"); // Exibe os livros não-novidades
  ?>
</section>



 <section id="testimonials" class="testimonials" >
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
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Eduardo Rossi</h3>
                      <h4> Professor</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    O site da biblioteca é incrivelmente útil! É fácil de navegar e encontrar informações atualizadas sobre os eventos,
                     horários de funcionamento e até mesmo sobre o acervo de livros disponíveis. Um recurso essencial para qualquer amante da leitura!
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Paola Silva</h3>
                      <h4>Aluna</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Achei o site da biblioteca extremamente conveniente. Ele oferece a opção de fazer reservas online para retirada de livros, o que economiza muito tempo.
                     Além disso, a seção de recomendações de leitura me ajudou a descobrir novos títulos interessantes.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Michele Bird</h3>
                      <h4>Professora</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Estou realmente satisfeita com o site da biblioteca! A variedade de livros disponíveis é incrível, com opções para todos os gostos e gêneros. 
                    A interface é intuitiva e fácil de usar, permitindo uma busca rápida e precisa. Nunca mais vou ficar sem leitura com essa biblioteca online!
                     <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Alberto Soares </h3>
                      <h4>Aluno</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    O site da biblioteca é uma fonte de conhecimento! Além de fornecer acesso ao catálogo completo de livros, encontrei clássicos que sempre desejei ler e títulos contemporâneos que ainda nem tinha ouvido falar. 
                    O sistema de reserva online facilita minha vida, sem precisar me preocupar em passar horas na biblioteca procurando livros. Já sou um fã fiel!
                   <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Robson Fernandes</h3>
                      <h4>Professor</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    O site da biblioteca é uma ótima ferramenta para qualquer pessoa interessada em praticidade. 
                    Além de fornecer informações sobre cada livro, ele também oferece a opção de reserva-los, 
                    o que é perfeito para estudantes com rotinas agitadas. Uma maravilhosa extensão da biblioteca física!

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
  exibirLivrosPaginados($conn, 'n',"livros"); // Exibe os livros não-novidades
  ?>
</section>



  

 </section>

 <?php
function exibirLivrosPaginados($conn, $novidade,$secaoId) {
  $consulta = $conn->prepare("SELECT * FROM games WHERE novidade = :novidade");
  $consulta->bindParam(':novidade', $novidade);
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
      <img src="<?php echo $livros[$i]["arquivo"]?>" class="card-img-top img_tamanho" alt="<?php echo $livros[$i]["nome"]?>">
      <h5 class="card-title"><?php echo $livros[$i]["nome"]?></h5>
      <p class="card-text"><?php echo $livros[$i]["plataforma"]?></p>
      <?php
      $media_avaliacoes = $livros[$i]["media_avaliacoes"];
      mediaEstrelasDeAvaliacao($media_avaliacoes);
      ?>
      <p class="card-text">R$<?php echo $livros[$i]["preco"]?></p>
      <a href="detalhes.php?codgame=<?php echo $livros[$i]['codgame']?>" class="btn btn-primary red-color-button" target="_blank">Ver</a>
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
      sectionElement.scrollIntoView({ behavior: 'smooth' });
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
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    Sobre Nossa Biblioteca de Reservas
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Bem-vindo à nossa Biblioteca de Reservas, o seu refúgio literário onde as páginas ganham vida e as histórias se desdobram. Nós nos dedicamos a conectar os amantes da leitura com os tesouros literários que aguardam ser explorados.<br><br>
                   Nossa plataforma de reserva de livros oferece uma experiência simples e conveniente, permitindo que você mergulhe em uma vasta coleção de títulos emocionantes, desde clássicos atemporais até as mais recentes aventuras literárias. Com um clique, você pode reservar o livro que deseja e embarcar em uma jornada através das palavras.<br><br>
                   Nossa missão é promover o amor pela leitura e fortalecer a comunidade de leitores. Acreditamos que cada livro reserva um mundo único para ser descoberto, e estamos aqui para facilitar essa jornada. Além disso, estamos comprometidos em fornecer um serviço excepcional, garantindo que sua experiência conosco seja suave e enriquecedora.<br><br>
                   Fique à vontade para explorar nossa biblioteca virtual, reservar seus livros favoritos e compartilhar suas descobertas literárias com amigos e familiares. Juntos, podemos criar um espaço onde as histórias continuam a inspirar, ensinar e entrelaçar nossas vidas.<br><br>
                   Agradecemos por escolher a bibliotecs como seu destino literário. Prepare-se para embarcar em aventuras inesquecíveis, página por página.<br><br>
                   Leia, explore, sonhe.<br><br>
                   Equipe da Bibliotecs
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    Quanto tempo o leitor poderá ficar com o livro reservado?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  O leitor podera ficar com o livro reservado com duração de uma semana, após essa semana poderá renovar por mais uma semana. 
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    ficou mais alguma duvida? entre  em contato:
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

 
 <section id="livrosPDF" class="container" >
  <p class="fs-1 text-center">Livros em PDF</p>
  <?php
  exibirLivrosPaginados($conn, 's', "novidades"); 
  ?>
  </section>

 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Mon-Sat: 11AM - 23PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

    
</div>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Bibliotecs</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>contato</h4>
          <ul>
            <p>
            <strong>Phone:</strong>
            <br> (65) 3885-5712<br>
             (79) 2937-7594<br>
            <strong>Email:</strong> 
            <br>info@example.com<br>
            info@example.com<br>
          </p>
          <strong>Endreço:</strong> 
            <br>Rua maria das Dores , 000, São José Do Rio Pardo-SP<br>
          </p>
              </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>quem somos</h4>
<p>A reserva online de livros em bibliotecas oferece um acesso conveniente a uma variedade de obras digitais, possibilitando empréstimos virtuais e flexibilidade na leitura por meio de dispositivos. Além disso, a opção de retirada presencial após a reserva no site promove o acesso acessível ao conhecimento e à cultura</p> </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>telefones para doações</h4>
          <p>
          (65) 1234-5712<br>
             (79) 4321-7594<br>
          </p>

        </div>

      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>