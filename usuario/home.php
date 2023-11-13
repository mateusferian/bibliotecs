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
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/hero.php";
?>

    <!--Novidades -->
    <section id="destaques" class="container">
        <p class="fs-1 text-center mt-5">Destaques</p>

        <?php
  include 'funcoes/funcoes.php';

  exibirLivrosPaginados($conn, 'S', "destaque", "todos"); // Exibe os livros não-novidades
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

                <?php
                        $consultaComentario = $conn->prepare("SELECT * FROM tbl_comentario;");
                        $consultaComentario->execute();

                        while ($rowComentario = $consultaComentario->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo $rowComentario["avatar"]?>" class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3><?php echo $rowComentario['nome']; ?></h3>
                                                <h4> <?php echo $rowComentario['cargo']; ?></h4>
                                                <div class="stars">
                                                <?php
                                                $rating = $rowComentario['estrela'];
                                                for ($i = 1; $i <= 5; $i++) {
                                                    // Se $i for menor ou igual à classificação, defina a classe para "bi-star-fill" (estrela preenchida), caso contrário, defina para "bi-star" (estrela vazia).
                                                    $class = ($i <= $rating) ? "bi-star-fill" : "bi-star";
                                                    echo '<i class="bi ' . $class . '"></i>';
                                                }
                                                ?>
                                            </div>


                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <?php echo $rowComentario['comentario']; ?>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>



                   

                    

                   



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
  exibirLivrosPaginados($conn, 'N',"livros","livronNormal"); // Exibe os livros não-novidades
  ?>
    </section>





    </section>

    <?php
function exibirLivrosPaginados($conn, $destaque,$secaoId, $tipoLIvro) {
  if(($destaque == "S") and ($tipoLIvro =="todos")){
  $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE destaque = 'S' AND situacao = '1' AND disponibilidade = 'naoRetirado'");
  }
  else if (($destaque == "N") and ($tipoLIvro =="livronNormal")){
    $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE destaque = 'N' AND situacao = '1' AND disponibilidade = 'naoRetirado' AND arquivo2 = '0'");
  }else if (($destaque == "N") and ($tipoLIvro =="livroPdf")){
    $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE destaque = 'N' AND situacao = '1' AND disponibilidade = 'naoRetirado' AND arquivo2 <> '0'");
  }
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
            <h5 class="card-title"><br><?php echo ucwords(strtolower($livros[$i]["nome"])); ?></h5>
            
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




<div id ="testimonials">
    <section id="ajuda" class="faq">

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
                                    Ao navegar na página inicial, a pessoa escolhe o livro que deseja e clica em 'Ver'.
                                    Isso a direciona para a página de informações específicas do livro. Nessa página,
                                    ela pode clicar no botão 'Reservar'
                                    para garantir o livro. Após a reserva ser concluída com sucesso, a pessoa poderá
                                    retirar o livro na escola.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-4">
                                    <span class="num">4.</span>
                                    Quais são os motivos mais comuns para ser bloqueado de fazer reservas no site da
                                    escola?
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    o motivo mais comum para ser bloqueado de fazer reservas no site da escola estão
                                    frequentemente
                                    relacionados ao comportamento do usuário e ao cumprimento das políticas da
                                    biblioteca da escola.
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
</div>


    <section id="livrosPDF" class="container">
        <p class="fs-1 text-center">Livros em PDF</p>
        <?php
  exibirLivrosPaginados($conn, 'N', "destaque" , "livroPdf"); 
  ?>
    </section>
    </div>


    <div id ="testimonials">
    <section id="eventos" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Eventos</h2>
                <p>Prepare-se para uma Experiência Inesquecível e descubra Eventos Imperdíveis!</p>
            </div>

            <div class="row gx-lg-0 gy-4">
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-start overflow-auto"
                        style="max-height: 400px;">
                        <?php
            $consulta = $conn->prepare("SELECT * FROM tbl_evento;");
            $consulta->execute();

            try {
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultados as $index => $rowEvento) {
            ?>
                        <div class="info-item d-flex evento" data-index="<?php echo $index; ?>">
                            <i class="bi bi-calendar-event flex-shrink-0 evento-icon"></i>
                            <div>
                                <?php
                                  $nome = $rowEvento['nome'];
                                  $nome_quebrada = wordwrap(mb_strtoupper($nome), 15, "<br>\n", false);

                                ?>
                                <p class="h3"><?php echo $nome_quebrada; ?></p>

                                <p class="h6"><?php echo $rowEvento['dataEvento']; ?></p>
                            </div>
                        </div>

                        <div class="descricao-evento" id="descricao-evento-<?php echo $index; ?>">
                            <?php
                                  $nome = $rowEvento['nome'];
                                  $nome_quebrada = wordwrap(mb_strtoupper($nome), 15, "<br>\n", false);
                                ?>
                            <p class="h3"><?php echo $nome_quebrada; ?></p>

                            <p class="h6"><?php echo $rowEvento['dataEvento']; ?></p>
                            <br>

                            <?php
                              $descricao = $rowEvento['descricao'];
                              $descricao_quebrada = wordwrap($descricao, 30, "<br>\n", false);
                              ?>
                            <p class="h6"><?php  echo $descricao_quebrada;?></p>
                        </div>
                        <?php
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
            ?>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="php-email-form">
                        <!-- A descrição do evento aparecerá aqui quando o ícone for clicado -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const eventos = document.querySelectorAll(".evento");
        const descricaoEvento = document.querySelector(".php-email-form");
        const mensagemPadrao = `
        <p class="h3">BEM-VINDO À NOSSA PÁGINA DE EVENTOS!</p>
        <p class="h6">Aqui você encontrará uma lista dos eventos emocionantes que estão programados para ocorrer em breve. Cada evento é exibido com o nome e um ícone ao lado. Para saber mais detalhes sobre um evento específico, basta clicar no ícone correspondente ao lado do nome. Isso abrirá a descrição completa do evento, incluindo datas, horários e informações adicionais. Se você deseja ver todos os eventos, basta posicionar a seta do mouse sobre o nome e datas e, em seguida, use a roda de rolagem do mouse para deslocar a lista e visualizar todos os eventos. Explore nossa lista de eventos e fique por dentro de tudo o que está acontecendo!</p>
    `;
        eventos.forEach(function(evento, index) {
            evento.addEventListener("click", function() {
                const descricao = document.querySelector("#descricao-evento-" + index);
                descricaoEvento.innerHTML = descricao.innerHTML;
            });
        });

        // Exibe a mensagem padrão inicialmente
        descricaoEvento.innerHTML = mensagemPadrao;
    });
    </script>



    <?php
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>

</body>

</html>