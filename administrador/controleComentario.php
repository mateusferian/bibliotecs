<?php
    require_once "include/header.php";
?>
<link href="css/swalFireLivro.css" rel="stylesheet">
<script src="js/model.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
.img_lista {
    max-width: 100px;
    height: auto;
}

        .estrelas input[type=radio]{
	display: none;
    }.estrelas label i.fa:before{
	content: '\f005';
	color: #FC0;
    }.estrelas  input[type=radio]:checked  ~ label i.fa:before{
	color: #CCC;
    }
    </style>

</head>

<body>
<?php
    $nomeDaPagina ="Controle de Comentario";
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



<div class="container mt-5">
    <table class="table table-bordered text-center">
        <thead>
            <tr class="bg-light">
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">CARGO</th>
                <th scope="col">COMENTARIO</th>
                <th scope="col">AVATAR</th>
                <th scope="col">AVALIAÇÃO</th>
                <th colspan="2" scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $consulta = $conn->prepare("SELECT COUNT(*) as total FROM tbl_comentario");
                $consulta->execute();
                $totalLivros = $consulta->fetch(PDO::FETCH_ASSOC)['total'];
                $livrosPorPagina = 10;
                $totalPaginas = ceil($totalLivros / $livrosPorPagina);

                $paginaAtual1 = isset($_GET['pagina1']) ? max(1, $_GET['pagina1']) : 1;
                $indiceInicial = ($paginaAtual1 - 1) * $livrosPorPagina;

                $consulta = $conn->prepare("SELECT * FROM tbl_comentario  LIMIT $indiceInicial, $livrosPorPagina");
                $consulta->execute();

                while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';

                    echo '<td class="table-description" data-description="' . $row["nome"] . '" onclick="openDescriptionModal(this)">';
                    $nome = $row["nome"];
                    limitandoCampos($nome);
                    echo '</td>';

                    echo '<td class="table-description" data-description="' . $row["cargo"] . '" onclick="openDescriptionModal(this)">';
                    $autor = $row["cargo"];
                    limitandoCampos($autor);
                    echo '</td>';

                    echo '<td class="table-description" data-description="' . $row["comentario"] . '" onclick="openDescriptionModal(this)">';
                    $descricao = $row["comentario"];
                    limitandoCampos($descricao);
                    echo '</td>';

                    echo '<td><img src="' . $row["avatar"] . '" class="img_lista img-fluid"></td>';

                    $estrela = $row["estrela"];
                    
                    echo '<td class="table-description" data-description="' . $estrela . '">';
                    
                    // Output the stars based on the rating value
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $estrela) {
                            echo '<i class="fa fa-star" style="color: #FC0;"></i>';
                        } else {
                            echo '<i class="fa fa-star" style="color: #CCC;"></i>';
                        }
                    }
                    
                    echo '</td>';


                    echo '<td>';
                    echo '<a href="alterarComentario.php?al=' . $row["id"] . '">Alterar</a>';
                    echo '</td>';

                    echo '<td>';
                    echo '<a href="controleComentario.php?ex=' . $row["id"] . '">Excluir</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }

            function limitandoCampos($campo) {
                if (strlen($campo) > 100) {
                    echo substr($campo, 0, 100) . '...';
                } else {
                    echo $campo;
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
</div>

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


        <?php

        try {
            if (isset($_REQUEST["ex"])) {
                $id = $_REQUEST["ex"];
                deletando($id,$conn );
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
       $conn;
       ?>

    <?php
    function deletando($id,$conn ){
                $stmt = $conn->prepare("SELECT nome FROM tbl_comentario WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $comentario = $stmt->fetch(PDO::FETCH_ASSOC);

                echo "<script>
                Swal.fire({
                    title: 'Apagar',
                    html: '<p>Tem certeza que deseja apagar o comentario de \"" . $comentario['nome'] . "\"?</p>',
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

                        window.location.href = 'controleComentario.php?excluir=true&id=" . $id . "';
                    }else{
                    }
                });
                </script>";
                }

                if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    $stmt = $conn->prepare("DELETE FROM tbl_comentario WHERE id = :id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                
                    if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                        $id = $_GET['id'];
                    
                        $stmt = $conn->prepare("DELETE FROM tbl_comentario WHERE id = :id");
                        $stmt->bindValue(':id', $id);
                        $stmt->execute();
                    
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'comentario apagado com sucesso',
                                customClass: {
                                    popup: 'swalFireLivroApagado',
                                },
                                showConfirmButton: false,
                                allowOutsideClick: false  
                            });
                    
                            // Redirecione automaticamente após um breve atraso
                            setTimeout(function() {
                                window.location.href = 'controleComentario.php';
                            }, 4000);
                        </script>";
                    }
                    
                }
                require_once "include/footer.php";
                require_once "include/scrollTop.php";
?>
</body>

</html>