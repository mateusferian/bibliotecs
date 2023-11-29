<?php
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
    $nomeDaPagina ="Controle de livros";
    $nomeDaPagina2 ="em PDF";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
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
            <form method="get" action="controleDeLivroPDF.php">
                <p class="fs-5 mt-5">Opções de filtragem</p>
                <select class="form-control" name="filtro" id="filtro">
                    <option value="SemFiltro" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'SemFiltro' ? 'selected' : ''; ?>>Sem Filtro</option>
                    <option value="Séries da Literatura Estrangeira" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Séries da Literatura Estrangeira' ? 'selected' : ''; ?>>Séries da Literatura Estrangeira</option>
                    <option value="Diversos da Literatura Estrangeira" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Diversos da Literatura Estrangeira' ? 'selected' : ''; ?>>Diversos da Literatura Estrangeira</option>
                    <option value="Diversos da Literatura Brasileira" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Diversos da Literatura Brasileira' ? 'selected' : ''; ?>>Diversos da Literatura Brasileira</option>
                    <option value="Poemas e Poesias" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Poemas e Poesias' ? 'selected' : ''; ?>>Poemas e Poesias</option>
                    <option value="Auto-Ajuda e Religião" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Auto-Ajuda e Religião' ? 'selected' : ''; ?>>Auto-Ajuda e Religião</option>
                    <option value="Clássico da Literatura Brasileira e Português" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Clássico da Literatura Brasileira e Português' ? 'selected' : ''; ?>>Clássico da Literatura Brasileira e Português</option>
                    <option value="Contos" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'Contos' ? 'selected' : ''; ?>>Contos</option>
                </select>
                <button id="botao" type="submit" class="btn btn-primary mt-2 botao-filtrar">Filtrar</button>
            </form>
        </div>
    </div>
</div>

    
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
                    <th scope="col">SINOPSE</th>
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

        $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "SemFiltro";

        $consultaSQL = "SELECT * FROM tbl_livro";

        if ($filtro === "SemFiltro") {
            $consultaSQL .= " WHERE arquivo2 != '0'";
        
        } elseif ($filtro === "Séries da Literatura Estrangeira") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Séries da Literatura Estrangeira')";
        
        } elseif ($filtro === "Diversos da Literatura Estrangeira") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Diversos da Literatura Estrangeira')";
        
        } elseif ($filtro === "Diversos da Literatura Brasileira") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Diversos da Literatura Brasileira')";
        
        } elseif ($filtro === "Poemas e Poesias") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Poemas e Poesias')";
        
        } elseif ($filtro === "Auto-Ajuda e Religião") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Auto-Ajuda e Religião')";
        
        } elseif ($filtro === "Clássico da Literatura Brasileira e Português") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Clássico da Literatura Brasileira e Português')";
        
        } elseif ($filtro === "Contos") {
            $consultaSQL .= " WHERE (arquivo2 != '0') AND (categoria = 'Contos')";
        }
        

        $consulta = $conn->prepare($consultaSQL);
        $consulta->execute();

        $totalAlunos = $consulta->rowCount();
        $alunosPorPagina = 10;
        $totalPaginas = ceil($totalAlunos / $alunosPorPagina);

        $paginaAtual = isset($_GET['pagina']) ? max(1, $_GET['pagina']) : 1;
        $indiceInicial = ($paginaAtual - 1) * $alunosPorPagina;

        $consultaSQL .= " LIMIT $indiceInicial, $alunosPorPagina;";
        $consulta = $conn->prepare($consultaSQL);
        $consulta->execute();
        
        

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id_liv"] . '</td>';
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["nome"]) . '" onclick="openDescriptionModal(this)">';
            $nome = $row["nome"];      
            limitandoCampos($nome);  
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["isbn"]) . '" onclick="openDescriptionModal(this)">';
            $isbn = $row["isbn"];      
            limitandoCampos($isbn);  
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["categoria"]) . '" onclick="openDescriptionModal(this)">';
            $categoria = $row["categoria"];      
            limitandoCampos($categoria);  
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["autor"]) . '" onclick="openDescriptionModal(this)">';
            $autor = $row["autor"];      
            limitandoCampos($autor);  
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["ano"]) . '" onclick="openDescriptionModal(this)">';
            $ano = $row["ano"];      
            limitandoCampos($ano);
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["destaque"]) . '" onclick="openDescriptionModal(this)">';
            $destaque = $row["destaque"];      
            limitandoCampos($destaque);
            
            if ($row["disponibilidade"] == "naoRetirado") {
                $disponibilidade = "Não Retirado"; 
                echo '<td class="table-description" data-description="' . htmlspecialchars($disponibilidade) . '" onclick="openDescriptionModal(this)">';     
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            } else {
                $disponibilidade = "Retirado";     
                echo '<td class="table-description" data-description="' . htmlspecialchars($disponibilidade) . '" onclick="openDescriptionModal(this)">';     
                limitandoCampoDisponibilidade($disponibilidade, $row["disponibilidade"]);  
            }
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["descricao"]) . '" onclick="openDescriptionModal(this)">';
            $descricao = $row["descricao"];
            limitandoCampos($descricao);
            
            echo '<td class="table-description" data-description="' . htmlspecialchars($row["editora"]) . '" onclick="openDescriptionModal(this)">';
            $editora = $row["editora"];      
            limitandoCampos($editora);  
            
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
            
            echo '<a href="alterarLivroPDF.php?al=' . $row["id_liv"] . '">Alterar</a>';
            echo '</td>';
            
            echo '<td>';
            echo '<a href="controleDeLivroPDF.php?ex=' . $row["id_liv"] . '">Excluir</a>';
            echo '</td>';
            echo '</tr>';
        }
        } catch (PDOException $erro) {
          echo $erro->getMessage();
        }


        function limitandoCampos($campo) {
            // Remova a função existente e substitua pelo seguinte código
            echo '<span class="modal-description">';
            if (strlen($campo) > 100) {
                echo substr($campo, 0, 100) . '...';
            } else {
                echo $campo;
            }
            echo '</span>';
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

            if ($paginaAtual > $groupSize) {
                $startPage = $paginaAtual - floor($groupSize / 2);
            }

            for ($i = $startPage; $i <= min($startPage + $groupSize - 1, $totalPaginas); $i++) {
                $activeClass = $i == $paginaAtual ? 'active' : '';

                if ($i == $startPage && $i > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i - 1) . '&filtro=' . $filtro . '">...</a></li>';
                }

                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina=' . $i . '&filtro=' . $filtro . '">' . $i . '</a></li>';

                if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i + 1) . '&filtro=' . $filtro . '">...</a></li>';
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
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não',
                    timer: 4000,
                    timerProgressBar: true, 
                    allowOutsideClick: false      
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = 'controleDeLivroPDF.php?excluir=true&id=" . $id . "';
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
                                title: 'Livro em PDF apagado com sucesso!',
                                customClass: {
                                    popup: 'swalFireLivroApagado',
                                },
                                showConfirmButton: false,
                                allowOutsideClick: false  
                            });
                    
                            // Redirecione automaticamente após um breve atraso
                            setTimeout(function() {
                                window.location.href = 'controleDeLivroPDF.php';
                            }, 4000);
                        </script>";

                    }
                    

                }
                require_once "include/footer.php";
                require_once "include/scrollTop.php";
?>
</body>

</html>