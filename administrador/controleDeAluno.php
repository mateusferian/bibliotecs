<?php
    require_once "include/header.php";
?>
<link href="css/controleDeAluno.css" rel="stylesheet">

<style>
.img_novidades {
    max-width: 80%;
    height: auto;
}

.img_tamanho {
    max-width: 300px;
    height: auto;
}

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
    <p class="fs-2 text-center mt-5">Controle de Alunos</p>
    <div class="container mt-4">
        <form method="get">
            <p class="fs-5 mt-5">Opção de filtragem</p>
            <select class="form-control" name="filtro">
                <option value="opcao0">sem filtro</option>
                <option value="opcao1">há 7 dias</option>
                <option value="opcao2">há 14 dias</option>
                <option value="opcao3">há 21 dias</option>
                <option value="opcao4">mais de 21 dias</option>
            </select>
            <button id="botao" type="submit" class="btn btn-primary mt-2 botao-filtrar">Filtrar</button>
        </form>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL-INSTITUCIONAL</th>
                    <th scope="col">SALA</th>
                    <th scope="col">SITUAÇÃO</th>
                    <th colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
            try {
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "opcao0";

                $consultaSQL = "SELECT * FROM tbl_aluno";

                if ($filtro === "opcao1") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 0 AND DATEDIFF(CURDATE(), dataEntrega) <= 7";
                } elseif ($filtro === "opcao2") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 7 AND DATEDIFF(CURDATE(), dataEntrega) <= 14";
                } elseif ($filtro === "opcao3") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 14 AND DATEDIFF(CURDATE(), dataEntrega) <= 21";
                } elseif ($filtro === "opcao4") {
                    $consultaSQL .= " WHERE DATEDIFF(CURDATE(), dataEntrega) > 21";
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

                while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
                  ?>
                <tr>
                    <td><?php echo $row["id"] ?> </td>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["sala"] ?></td>
                    <td>
                        <?php
            if ($row["situacao"] == 1) {
                ?>
                        <center> <img src="imagensDeFundo/ativado.jpg" height="15" width="15" title="Ativado"></center>
                        <?php
                } else {
                ?>
                        <center> <img src="imagensDeFundo/desativado.jpg" height="15" width="15" title="Ativado">
                        </center>
                        <?php
                }
                ?>
                    </td>;
                    <td>
                        <a href="alterar.php?al=<?php echo $row["id"]; ?>">Alterar</a>
                    </td>
                    <td>
                        <a href="controleDeAluno.php?ex=<?php echo $row["id"]; ?>">Excluir</a>
                    </td>
                </tr>
                <?php
     }
     }catch(PDOException $erro){
       echo $erro->getMessage();
     }
  ?>
            </tbody>
        </table>
        <?php
    try{
     if (isset($_REQUEST["ex"])) {
        $id = $_REQUEST["ex"];
        deletandoAluno($id, $conn);
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
    function deletandoAluno($id,$conn ){
        $stmt = $conn->prepare("SELECT nome FROM tbl_aluno WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<script>
        Swal.fire({
            title: 'Apagar',
            html: '<p>Tem certeza que deseja apagar  \"" . $aluno['nome'] . "\"?</p>',
            customClass: {
                popup: 'swalFireControleDeAluno',
            },
            showCancelButton: true,
            confirmButtonText: 'sim',
            cancelButtonText: 'não',
            timer: 5000,
            timerProgressBar: true,
            allowOutsideClick: false      
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = 'controleDeAluno.php?excluir=true&id=" . $id . "';
            }else{
            }
        });
        </script>";
        }

        if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $stmt = $conn->prepare("DELETE FROM tbl_aluno WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        
            if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                $id = $_GET['id'];
            
                $stmt = $conn->prepare("DELETE FROM tbl_aluno WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();
            
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Aluno apagado com sucesso',
                        customClass: {
                            popup: 'swalFireControleDeAlunoApagado',
                        },
                        showConfirmButton: false,
                        allowOutsideClick: false  
                    });
            
                    // Redirecione automaticamente após um breve atraso
                    setTimeout(function() {
                        window.location.href = 'controleDeAluno.php';
                    }, 3000); 
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