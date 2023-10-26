<?php
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
    
  $idlivro = $_REQUEST["al"];
  $consulta = $conn->prepare("SELECT * FROM tbl_livro where id_liv=:id_liv;");
  $consulta->bindValue(':id_liv', $idlivro);
  $consulta->execute();
  $row=$consulta -> fetch(PDO::FETCH_ASSOC);
  }
  
  }
  
  catch (PDOException $erro){
  	echo $erro->getMessage();
  }
?>


    <legend>Alterar Dados de Livros</legend>

    <form name="form" method="post" action="alterarLivro.php" enctype="multipart/form-data">
        <div class="row">

            <div class="col-sm-12  mt-3">
                <label for="id" class="form-label"> ID: </label><br>
                <input type="text" name="id_liv" class="form-control"
                    value="<?php if(isset($row['id_liv'])) {echo $row['id_liv'];} ?>" readonly="readonly"><br>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="nome" class="form-label">Nome </label><br>
                <input type="text" name="nome" class="form-control"
                    value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="isbn" class="form-label"> Isbn: </label><br>
                <input type="text" name="isbn" class="form-control"
                    value="<?php if(isset($row['isbn'])) {echo $row['isbn'];} ?>"><br>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="situacao">Situação</label>
                <select class="form-control" name="situacao" id="situacao">
                    <option value="1"
                        <?php if (isset($row['situacao']) && $row['situacao'] == 1) { echo 'selected'; } ?>>
                        Ativado</option>
                    <option value="0"
                        <?php if (isset($row['situacao']) && $row['situacao'] == 0) { echo 'selected'; } ?>>
                        Desativado</option>
                </select>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-control"
                    value="<?php if(isset($row['categoria'])) {echo $row['categoria'];} ?>" id="categoria">
                    <option selected>Selecione o gênero</option>
                    <option value="Séries da Literatura Estrangeira">Séries da Literatura Estrangeira</option>
                    <option value="Diversos da Literatura Estrangeira">Diversos da Literatura Estrangeira</option>
                    <option value="Diversos da Literatura Brasileira">Diversos da Literatura Brasileira</option>
                    <option value="Poemas e Poesias">Poemas e Poesias</option>
                    <option value="Auto-Ajuda e Religião">Auto-Ajuda e Religião</option>
                    <option value="Clássico da Literatura Brasileira e Português">Clássico da Literatura Brasileira e
                        Português</option>
                    <option value="Contos">Contos</option>
                </select>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control"
                    value="<?php if(isset($row['autor'])) {echo $row['autor'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="text" name="ano" class="form-control"
                    value="<?php if(isset($row['ano'])) {echo $row['ano'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="editora" class="form-label">Editora</label>
                <input type="text" name="editora" class="form-control"
                    value="<?php if(isset($row['editora'])) {echo $row['editora'];} ?>" id="editora">
            </div>

            <div class="col-sm-12  mt-3">
                <label for="destaque" class="form-label">Destaque</label>
                <select name="destaque" class="form-control"
                    value="<?php if(isset($row['destaque'])) {echo $row['destaque'];} ?> " id="destaque">
                    <option value="S">S</option>
                    <option value="N">N </option>
                </select>
            </div>


            <div class="col-sm-6   mt-3">
                <label for="imagem" class="form-label">Selecione a Imagem</label>
                <input type="file" name="arquivo" class="form-control"
                    value="<?php if(isset($row['arquivo'])) {echo $row['arquivo'];} ?>"><br>
            </div>


            <div class="col-sm-6  mt-3">
                <label for="pdf" class="form-label">Selecione o arquivo PDF</label>
                <input type="file" name="arquivo2" class="form-control"
                    value="<?php if(isset($row['arquivo2'])) {echo $row['arquivo2'];} ?>">
            </div>

            <div class="col-md-12 mx-auto">
                <label for="descricao" class="form-label">
                    <h5>Sinópse</h5>
                </label>
                <textarea type="text" name="descricao" class="form-control"
                    value="<?php if(isset($row['descricao'])) {echo $row['descricao'];} ?>" id="descricao"></textarea>
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
            $idlivro = $_REQUEST["id_liv"];
            $nome = $_REQUEST["nome"];
            $isbn = $_REQUEST["isbn"];
            $categoria = $_REQUEST["categoria"];
            $autor = $_REQUEST["autor"];
            $ano = $_REQUEST["ano"];
            $destaque = $_REQUEST["destaque"];
            $descricao = $_REQUEST["descricao"];
            $editora = $_REQUEST["editora"];
    
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("d-m-Y");
            $time = date("H-i-s");
      
            if (!empty($_FILES["arquivo"]["name"])) {
      
      
              $nomeimg =     $_FILES["arquivo"]["name"];
              $temp =     $_FILES["arquivo"]["tmp_name"];
              $tamanho =  $_FILES["arquivo"]["size"];
              $tipoimg =     $_FILES["arquivo"]["type"];
              $erro =     $_FILES["arquivo"]["error"];
      
              $ext = pathinfo($nomeimg, PATHINFO_EXTENSION);
      
              if (($ext != 'jpg') and  ($ext != 'png')) {
                echo "<script language=javascript>
                alert('SÓ É POSSÍVEL FAZER UPLOAD DE ARQUIVO COM EXTENSÃO JPG OU PNG!!');
                location.href = 'alterar.php?al=$idusuario';
                </script>";
                exit;
              }
      
              if ($tamanho > 900000) {
                echo "<script language=javascript>
                alert('	VERIFIQUE O TAMANHO DO SEU ARQUIVO!!');
                location.href = 'alterar.php?al=$idusuario';
                </script>";
                exit;
              }

              $num = rand(1, 10000000000);
      
              $novo_nomeimg = 'img' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext;
      
              $mover = move_uploaded_file($temp, '../img/' . $novo_nomeimg);
      
              $arquivo = '../img/' . $novo_nomeimg;
            } else {
      
              $arquivo = $_REQUEST['caminho_arquivo'];
            }

      $nomeimg2 =  $_FILES["arquivo2"]["name"];

      $temp2 =     $_FILES["arquivo2"]["tmp_name"];

      $tamanho2 =  $_FILES["arquivo2"]["size"];

      $tipoimg2 =  $_FILES["arquivo2"]["type"];

      $erro2 =     $_FILES["arquivo2"]["error"];

      $ext2 = "pdf";
      $novo_nomeimg2 = 'arquivo' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext2;
      $arquivo2 = '../pdf/' . $novo_nomeimg2;

      $mover2 = move_uploaded_file($temp2, '../pdf/' . $novo_nomeimg2);

      if($tamanho2==0){
        $arquivo2= 0;
      }
            $sql = $conn->prepare("UPDATE tbl_livro SET nome = :nome, isbn = :isbn, categoria = :categoria, autor = :autor, ano = :ano, destaque = :destaque, descricao = :descricao, editora = :editora,  arquivo=:arquivo, arquivo2=:arquivo2  WHERE id_liv = :id_liv");
            
            // Passagem de parâmetros para a tabela
            $sql->bindValue(':id_liv', $idlivro);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':isbn', $isbn);
            $sql->bindValue(':categoria', $categoria);
            $sql->bindValue(':autor', $autor);
            $sql->bindValue(':ano', $ano);
            $sql->bindValue(':destaque', $destaque);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':editora', $editora);
            $sql->bindValue(':arquivo', $arquivo);
            $sql->bindValue(':arquivo2', $arquivo2);

    
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
                    window.location.href = 'controleDeLivro.php';
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