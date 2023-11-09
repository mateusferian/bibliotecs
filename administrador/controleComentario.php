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



<p class="fs-2 text-center mt-5">Livros Cadastrados</p>

<div class="container mt-5">
    <table class="table table-bordered text-center">
        <thead>
            <tr class="bg-light">
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">CARGO</th>
                <th scope="col">COMENTARIO</th>
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

                    echo '<td class="table-description" data-description="' . $row["estrela"] . '" onclick="openDescriptionModal(this)">';
                    $estrela = $row["estrela"];
                    limitandoCampos($estrela);
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

    <?php
    function deletandoLivro($id,$conn ){
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
                        exit;
                    }
                    
                    exit;
                }
                require_once "include/footer.php";
                require_once "include/scrollTop.php";
?>
</body>

</html>