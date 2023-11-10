<?php
    require_once "../restrito.php";
    require_once "include/header.php";
?>
<link href="css/swalFireLivro.css" rel="stylesheet">
<script src="js/model.js"></script>

<style>
.img_lista {
    max-width: 100px;
    height: auto;
}
</style>

</head>

<body>
    <?php
    require_once "include/navbar.php";
    require_once "include/hero.php";
?>
    <style>
    .table-description {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        cursor: pointer;
    }

    .table-description.expanded {
        white-space: normal;
        max-width: none;
    }
    </style>


    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <form method="get" action="controleDeLivro.php">
                    <p class="fs-5 mt-5">Opção de filtragem</p>
                    <select class="form-control" name="filtro" id="filtro">
                        <option value="SemFiltro" selected>Sem Filtro</option>
                        <option value="Séries da Literatura Estrangeira">Séries da Literatura Estrangeira</option>
                        <option value="Diversos da Literatura Estrangeira">Diversos da Literatura Estrangeira</option>
                        <option value="Diversos da Literatura Brasileira">Diversos da Literatura Brasileira</option>
                        <option value="Poemas e Poesias">Poemas e Poesias</option>
                        <option value="Auto-Ajuda e Religião">Auto-Ajuda e Religião</option>
                        <option value="Clássico da Literatura Brasileira e Português">Clássico da Literatura Brasileira
                            e Português</option>
                    </select>
                    <button id="botao" type="submit" class="btn btn-primary mt-2 botao-filtrar">Filtrar</button>
                </form>
            </div>

            <script>
            // Recupere o elemento select
            var filtroSelect = document.getElementById("filtro");

            // Adicione um ouvinte de evento para salvar a seleção no armazenamento local quando a seleção for alterada
            filtroSelect.addEventListener("change", function() {
                localStorage.setItem("filtroSelecionado", filtroSelect.value);
            });

            // Verifique se há uma seleção armazenada localmente e defina-a como a opção selecionada
            var filtroSelecionado = localStorage.getItem("filtroSelecionado");
            if (filtroSelecionado) {
                filtroSelect.value = filtroSelecionado;
            }
            </script>
        </div>
    </div>



    <p class="fs-2 text-center mt-5">Controle de livros</p>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">AUTOR</th>
                    <th scope="col">ANO</th>
                    <th scope="col">DESTAQUE</th>
                    <th scope="col">DISPONIBILIDADE</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">EDITORA</th>
                    <th scope="col">IMAGEM</th>
                    <th scope="col">SITUAÇÃO</th>
                    <th colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
      try {


        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filtro"])) {
            $categoria = $_GET["filtro"];
            if($categoria == "SemFiltro"){
                $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE arquivo2 IS NULL OR arquivo2 = '0'");
            }else{
            $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE (arquivo2 IS NULL OR arquivo2 = '0') AND categoria = :categoria");
            $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            }
        }else{
            $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE arquivo2 IS NULL OR arquivo2 = '0'");
        }
        
        $consulta->execute();
        $totalLivros = $consulta->fetch(PDO::FETCH_ASSOC)['total'];
        $livrosPorPagina = 10;
        $totalPaginas = ceil($totalLivros / $livrosPorPagina);
        
        $paginaAtual1 = isset($_GET['pagina1']) ? max(1, $_GET['pagina1']) : 1;
        $indiceInicial = ($paginaAtual1 - 1) * $livrosPorPagina;
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filtro"])) {
            $categoria = $_GET["filtro"];
            if($categoria == "SemFiltro"){
                $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE arquivo2 IS NULL OR arquivo2 = '0' LIMIT $indiceInicial, $livrosPorPagina");
            }else{
            $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE (arquivo2 IS NULL OR arquivo2 = '0') AND categoria = :categoria LIMIT $indiceInicial, $livrosPorPagina");
            $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            }
 
        } else {
            $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE arquivo2 IS NULL OR arquivo2 = '0' LIMIT $indiceInicial, $livrosPorPagina");
        }
        
        $consulta->execute();
        
        

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id_liv"] . '</td>';

            echo '<td class="table-description" data-description="' . $row["nome"] . '" onclick="openDescriptionModal(this)">';
            $nome = $row["nome"];      
            limitandoCampos($nome);  

            echo '<td>' . $row["isbn"] . '</td>';
            echo '<td>' . $row["categoria"] . '</td>';

            echo '<td class="table-description" data-description="' . $row["autor"] . '" onclick="openDescriptionModal(this)">';
            $autor = $row["autor"];      
            limitandoCampos($autor);  

            echo '<td>' . $row["ano"] . '</td>';
            echo '<td>' . $row["destaque"] . '</td>';
            if ($row["disponibilidade"] == "naoRetirado") {
                echo '<td class="table-description" data-description="' . $row["disponibilidade"] . '" onclick="openDescriptionModal(this)">';
                $disponibilidade = "Não Retirado";      
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            }
            else{
                echo '<td class="table-description" data-description="' . $row["disponibilidade"] . '" onclick="openDescriptionModal(this)">';
                $disponibilidade = "Retirado";      
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            }

            echo '<td class="table-description" data-description="' . $row["descricao"] . '" onclick="openDescriptionModal(this)">';
            $descricao = $row["descricao"];      
            limitandoCampos($descricao);   

            echo '<td>' . $row["editora"] . '</td>';
            echo '<td><img src="' . $row["arquivo"] . '" class="img_lista img-fluid"></td>';
            echo '<td>';
            if ($row["situacao"] == 1) {
                ?>
                <center> <img src="imagensDeFundo/ativado.jpg" height="15" width="15" title="Ativado"></center>
                <?php
                } else {
                ?>
                <center> <img src="imagensDeFundo/desativado.jpg" height="15" width="15" title="Ativado"></center>
                <?php
    
                }
                echo '</td>';
                echo '<td>';

            echo '<a href="alterarLivro.php?al=' . $row["id_liv"] . '">Alterar</a>';
            echo '</td>';
            
            echo '<td>';
            echo '<a href="controleDeLivro.php?ex=' . $row["id_liv"] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
          }
        } catch (PDOException $erro) {
          echo $erro->getMessage();
        }
        function limitandoCampos ($campo){
            if (strlen($campo) > 100) {
                echo substr($campo, 0, 100) . '...';
            } else {
                echo $campo;
            }
        }

        function limitandoCampoDisponibilidade($campo, $campoDaTabela) {
         if($campoDaTabela == "naoRetirado"){
            if (strlen($campo) > 100) {
                echo '<span style="color: green;">' . substr($campo, 0, 100) . '...</span>';
            } else {
                echo '<span style="color: green;">' . $campo . '</span>';
            }
        } else{
            if (strlen($campo) > 100) {
                echo '<span style="color: red;">' . substr($campo, 0, 100) . '...</span>';
            } else {
                echo '<span style="color: red;">' . $campo . '</span>';
            }
        }
    }
        
        
        ?>
            </tbody>
        </table>
        <div class="modal modal-container" onclick="closeDescriptionModal()" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <!-- Use 'modal-lg' para modal grande -->
                <div class="modal-content" onclick="event.stopPropagation()">
                </div>
            </div>
        </div>

        <?php

        try {
            if (isset($_REQUEST["ex"])) {
                $id = $_REQUEST["ex"];
                deletandoLivro($id,$conn );
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
       $conn;
       ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center custom-pagination">
                <?php
    $groupSize = 5;
    $startPage = 1;

    if ($paginaAtual1 > $groupSize) {
      $startPage = $paginaAtual1 - floor($groupSize / 2);
    }

    for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
      $activeClass = $i == $paginaAtual1 ? 'active' : '';

      if ($i == $startPage && $i > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina1=' . ($i - 1) . '">...</a></li>';
      }

      echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina1=' . $i . '">' . $i . '</a></li>';

      if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina1=' . ($i + 1) . '">...</a></li>';
      }
    }
    ?>
            </ul>
        </nav>
    </div>

    <p class="fs-2 text-center mt-5">Livros em PDF Cadastrados</p>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">AUTOR</th>
                    <th scope="col">ANO</th>
                    <th scope="col">DESTAQUE</th>
                    <th scope="col">DISPONIBILIDADE</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">EDITORA</th>
                    <th scope="col">IMAGEM</th>
                    <th scope="col">PDF</th>
                    <th scope="col">SITUAÇÃO</th>
                    <th colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
      try {

        $livrosPorPagina = 10;




        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filtro"])) {
            $categoria = $_GET["filtro"];
            if($categoria == "SemFiltro"){
                $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE arquivo2 <> '0'");
            }else{
                $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE arquivo2 <> '0' AND categoria = :categoria");
                $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                }
        }else{
            $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_livro WHERE arquivo2 <> '0'");
        }
        
        $consulta->execute();
        $totalLivros = $consulta->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPaginas = ceil($totalLivros / $livrosPorPagina);
    
        $paginaAtual2 = isset($_GET['pagina']) ? max(1, $_GET['pagina']) : 1;
        $indiceInicial = ($paginaAtual2 - 1) * $livrosPorPagina;
    
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filtro"])) {
            $categoria = $_GET["filtro"];
            if($categoria == "SemFiltro"){
                $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE arquivo2 <> '0' LIMIT $indiceInicial, $livrosPorPagina");
            }else{
                $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE arquivo2 <> '0' AND categoria = :categoria LIMIT $indiceInicial, $livrosPorPagina");
                $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                }
 
        } else {
            $consulta = $conn->prepare("SELECT * FROM tbl_livro WHERE arquivo2 <> '0' LIMIT $indiceInicial, $livrosPorPagina");
        }
        
        $consulta->execute();

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<tr>';
            echo '<td>' . $row["id_liv"] . '</td>';

            echo '<td class="table-description" data-description="' . $row["nome"] . '" onclick="openDescriptionModal(this)">';
            $nome = $row["nome"];      
            limitandoCampos($nome);  

            echo '<td>' . $row["isbn"] . '</td>';
            echo '<td>' . $row["categoria"] . '</td>';

            echo '<td class="table-description" data-description="' . $row["autor"] . '" onclick="openDescriptionModal(this)">';
            $autor = $row["autor"];      
            limitandoCampos($autor);  

            echo '<td>' . $row["ano"] . '</td>';
            echo '<td>' . $row["destaque"] . '</td>';  
            if ($row["disponibilidade"] == "naoRetirado") {
                echo '<td class="table-description" data-description="' . $row["disponibilidade"] . '" onclick="openDescriptionModal(this)">';
                $disponibilidade = "Não Retirado";      
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            }
            else{
                echo '<td class="table-description" data-description="' . $row["disponibilidade"] . '" onclick="openDescriptionModal(this)">';
                $disponibilidade = "Retirado";      
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            }

            echo '<td class="table-description" data-description="' . $row["descricao"] . '" onclick="openDescriptionModal(this)">';
            $descricao = $row["descricao"];      
            limitandoCampos($descricao);   

            echo '<td>' . $row["editora"] . '</td>';
            echo '<td><img src="' . $row["arquivo"] . '" class="img_lista img-fluid"></td>';
            echo '<td><a href="' . $row["arquivo2"] . '">Download</a></td>';
            echo '<td>';
            if ($row["situacao"] == 1) {
                ?>
                <center> <img src="imagensDeFundo/ativado.jpg" height="15" width="15" title="Ativado"></center>
                <?php
                } else {
                ?>
                <center> <img src="imagensDeFundo/desativado.jpg" height="15" width="15" title="Ativado"></center>
                <?php
    
                }
                echo '</td>';
                echo '<td>';

            echo '<a href="alterarLivro.php?al=' . $row["id_liv"] . '">Alterar</a>';
            echo '</td>';
            
            echo '<td>';
            echo '<a href="controleDeLivro.php?ex=' . $row["id_liv"] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
          }
        } catch (PDOException $erro) {
          echo $erro->getMessage();
        }
        ?>
            </tbody>
        </table>

        <?php
      try{
            if (isset($_REQUEST["ex"])) {
                $id = $_REQUEST["ex"];
                deletandoLivro($id,$conn );

            }
      }catch(PDOException $erro){
        echo $erro->getMessage();
      }
       $conn;
       ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center custom-pagination">
                <?php
    $groupSize = 5;
    $startPage = 1; 

    if ($paginaAtual2 > $groupSize) {
      $startPage = $paginaAtual2 - floor($groupSize / 2);
    }

    for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
      $activeClass = $i == $paginaAtual2 ? 'active' : '';

      if ($i == $startPage && $i > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina2=' . ($i - 1) . '">...</a></li>';
      }

      echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina2=' . $i . '">' . $i . '</a></li>';

      if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina2=' . ($i + 1) . '">...</a></li>';
      }
    }
    ?>
            </ul>
        </nav>
    </div>
    <?php
    function deletandoLivro($id,$conn ){
                $stmt = $conn->prepare("SELECT nome FROM tbl_livro WHERE id_liv = :id_liv");
                $stmt->bindValue(':id_liv', $id);
                $stmt->execute();
                $livro = $stmt->fetch(PDO::FETCH_ASSOC);

                echo "<script>
                Swal.fire({
                    title: 'Apagar',
                    html: '<p>Tem certeza que deseja apagar  \"" . $livro['nome'] . "\"?</p>',
                    customClass: {
                        popup: 'swalFireLivro', // Classe CSS personalizada para a caixa de diálogo
                    },
                    showCancelButton: true, // Não mostrar o botão de cancelar
                    confirmButtonText: 'sim',
                    cancelButtonText: 'não',
                    timer: 4000,
                    timerProgressBar: true, 
                    allowOutsideClick: false      
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = 'controleDeLivro.php?excluir=true&id=" . $id . "';
                    }else{
                    }
                });
                </script>";
                }

                if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    $stmt = $conn->prepare("DELETE FROM tbl_livro WHERE id_liv = :id_liv");
                    $stmt->bindValue(':id_liv', $id);
                    $stmt->execute();
                
                    if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                        $id = $_GET['id'];
                    
                        $stmt = $conn->prepare("DELETE FROM tbl_livro WHERE id_liv = :id_liv");
                        $stmt->bindValue(':id_liv', $id);
                        $stmt->execute();
                    
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Livro apagado com sucesso',
                                customClass: {
                                    popup: 'swalFireLivroApagado',
                                },
                                showConfirmButton: false,
                                allowOutsideClick: false  
                            });
                    
                            // Redirecione automaticamente após um breve atraso
                            setTimeout(function() {
                                window.location.href = 'controleDeLivro.php';
                            }, 4000);
                        </script>";
                        exit;
                    }
                    
                    exit;
                }
                require_once "include/footer.php";
                require_once "include/scrollTop.php";
?>
</body>

</html>