<?php
require_once "../restrito.php";
require_once "include/header.php";
?>

<!-- css  -->
<link href="css/swalFireLivro.css" rel="stylesheet">
<link rel="stylesheet" href="css/botao.css">
<link rel="icon" type="image/png" sizes="16x16" href="imagenslogo.png.png">

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
try{
   if(isset($_REQUEST["al"])) {
    
  $id = $_REQUEST["al"];
  $consulta = $conn->prepare("SELECT * FROM tbl_comentario where id=:id;");
  $consulta->bindValue(':id', $id);
  $consulta->execute();
  $row=$consulta -> fetch(PDO::FETCH_ASSOC);
  }
  
  }
  
  catch (PDOException $erro){
  	echo $erro->getMessage();
  }
?>


    <legend>Alterar Dados de De Livro</legend>

    <form name="form" method="post" action="alterarComentario.php" enctype="multipart/form-data">
        <div class="row">

            <div class="col-sm-12  mt-3">
                <label for="id" class="form-label"> ID: </label><br>
                <input type="text" name="id" class="form-control"
                    value="<?php if(isset($row['id'])) {echo $row['id'];} ?>" readonly="readonly"><br>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="nome" class="form-label">Nome </label><br>
                <input type="text" name="nome" class="form-control"
                    value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="comentario" class="form-label"> comentario: </label><br>
                <input type="comentario" name="comentario" class="form-control"
                    value="<?php if(isset($row['comentario'])) {echo $row['comentario'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="cargo" class="form-label">cargo</label>
                <input type="text" name="cargo" class="form-control"
                    value="<?php if(isset($row['cargo'])) {echo $row['cargo'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="estrela" class="form-label">estrela</label>
                <input type="text" name="estrela" class="form-control"
                    value="<?php if(isset($row['estrela'])) {echo $row['estrela'];} ?>"><br>
            </div>

            <div class="col-12  mt-3">
                <button id="botao" type="submit" name="alterar" value="alterar"
                    class="btn btn-primary mt-2">alterar</button>
                <br><br>
            </div>
        </div>
    </form>

    <?php
try{
      if (isset($_REQUEST["alterar"])) {
        
        try {
                $id = $_REQUEST["id"];
                $nome = $_REQUEST["nome"];
                $comentario = $_REQUEST["comentario"];
                $cargo = $_REQUEST["cargo"];
                $estrela = $_REQUEST["estrela"];

                $sql = $conn->prepare("UPDATE tbl_comentario SET nome = :nome, comentario = :comentario, cargo = :cargo, estrela = :estrela WHERE id = :id");
                
                $sql->bindValue(':id', $id);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':comentario', $comentario);
                $sql->bindValue(':cargo', $cargo);
                $sql->bindValue(':estrela', $estrela);
        
                $sql->execute();

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Alteração realizado!!',
                    customClass: {
                        popup: 'swalFireLivro',
                    },
                    showCancelButton: false,
                    confirmButtonText: 'Ir para a página de controle de lirvo',
                    timer: 4000,
                    timerProgressBar: true, 
                    allowOutsideClick: false    
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'controleComentario.php';
                    }
                    
                });
                </script>";

            }catch (PDOException $erro){
            echo $erro->getMessage();
            }

        } 

    }catch (PDOException $erro){
	echo $erro->getMessage();
    }

    $conn = null;
    require_once "include/footer.php";
    require_once "include/scrollTop.php";
?>
</body>

</html>