<?php
    require_once "include/header.php";
?>
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
    require_once "protect.php";
    require_once "include/navbarProtec.php";
    require_once "include/hero.php";
?>
    <p class="fs-2 text-center mt-5">Controle de administrador</p>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">SITUAÇÃO</th>
                    <th scope="col">DATA DE CADASTRO</th>
                    <th colspan="2" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
            try {
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "opcao0";

                $consultaSQL = "SELECT * FROM tbl_administrador";

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
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($row['dataCadastro'])); ?></td>
                    <?php
                $bytes = random_bytes(7);
                $valorPermitido = bin2hex($bytes);
                ?>

                    <td>
                        <a
                            href="alterarAdministrador.php?protect=<?php echo urlencode($valorPermitido); ?>&al=<?php echo $row["id"]; ?>">Alterar</a>
                    </td>

                    <td>
                        <a
                            href="controleDeAdministrador.php?protect=<?php echo urlencode($valorPermitido); ?>&ex=<?php echo $row["id"]; ?>">Excluir</a>
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
        deletando($id, $conn);
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
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i - 1) . '&filtro=' . $filtro . '&protect=454545">...</a></li>';
                }
            
                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?pagina=' . $i . '&filtro=' . $filtro . '&protect=454545">' . $i . '</a></li>';
            
                if ($i == $startPage + $groupSize - 1 && $i < $totalPaginas) {
                    echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($i + 1) . '&filtro=' . $filtro . '&protect=454545">...</a></li>';
                }
            }            
            
            ?>
            </ul>
        </nav>
    </div>

    <?php
    function deletando($id,$conn ){                
        $stmt = $conn->prepare("SELECT nome FROM tbl_administrador WHERE id = :id");
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
            timer: 4000,
            timerProgressBar: true,
            allowOutsideClick: false      
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = 'controleDeAdministrador.php?protect=4343412123&excluir=true&id=" . $id . "';
            }else{
            }   
        });
        </script>";
        }

        if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $stmt = $conn->prepare("DELETE FROM tbl_administrador WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        
            if (isset($_GET['excluir']) && $_GET['excluir'] === 'true' && isset($_GET['id'])) {
                $id = $_GET['id'];
            
                $stmt = $conn->prepare("DELETE FROM tbl_administrador WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();
            
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Administrador apagado com sucesso',
                        customClass: {
                            popup: 'swalFireControleDeAlunoApagado',
                        },
                        showConfirmButton: false,
                        allowOutsideClick: false  
                    });
            
                    // Redirecione automaticamente após um breve atraso
                    setTimeout(function() {
                        window.location.href = 'controleDeAdministrador.php?protect=43432123';
                    }, 4000); 
                </script>";

            }
            
        }
        require_once "include/footer.php";
        require_once "include/scrollTop.php";
?>
</body>

</html>