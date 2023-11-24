<?php
require_once "include/header.php";
?>

        <!-- css  -->
        <link href="css/swalFireLivro.css" rel="stylesheet">
    <link rel="stylesheet" href="css/botao.css">

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
    $nomeDaPagina ="Cadastro de Livro";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
    require_once "include/recuperarTamanhoPermitido.php";
?>
<script>
    AOS.init();
    </script>

<br>

   <form name="form1" method="post" action="cadastroDeLivro.php"  onsubmit="return checkFileSize();" enctype="multipart/form-data">
   <div class="row">
   <div class="col-sm-12  mt-3">
          <label for="nome" class="form-label">Nome do Livro</label>
          <input type="text" class="form-control" id="nome" name="nome">
        </div>

        <div class="col-sm-12  mt-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>

        <div class="col-sm-6 mt-3">
        <label for="categoria" class="form-label">Categoria</label>
          <select id="categoria" name="categoria" class="form-control">
            <option value= "naoSelecionado" selected>Selecione o gênero</option>
            <option value="Séries da Literatura Estrangeira">Séries da Literatura Estrangeira</option>
            <option value="Diversos da Literatura Estrangeira">Diversos da Literatura Estrangeira</option>
            <option value="Diversos da Literatura Brasileira">Diversos da Literatura Brasileira</option>
            <option value="Poemas e Poesias">Poemas e Poesias</option>
            <option value="Auto-Ajuda e Religião">Auto-Ajuda e Religião</option>
            <option value="Clássico da Literatura Brasileira e Português">Clássico da Literatura Brasileira e Português</option>
            <option value="Contos">Contos</option>
          </select> 
        </div> 

        <div class="col-sm-6  mt-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control">
            </div>
	
        <div class="col-sm-6  mt-3">
          <label for="ano" class="form-label">Ano</label>
          <input type="text" class="form-control" id="ano" name="ano">
        </div>
        
        <div class="col-sm-6  mt-3">
          <label for="editora" class="form-label">Editora</label>
          <input type="text" class="form-control" id="editora" name="editora">
        </div>

        <div class="col-sm-12 mt-3">
        <label for="destaque" class="form-label">Destaque</label>
          <select id="destaque" name="destaque" class="form-control">
            <option value= "naoSelecionado" selected>Informe se o produto é destaque</option> 
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
        </div> 
  
        <div class="col-sm-6   mt-3">
          <label for="imagem" class="form-label">Selecione a Imagem</label>
          <input type="file" class="form-control" id="arquivo" name="arquivo">
        </div>
		
		  <div class="col-sm-6   mt-3">
          <label for="pdf" class="form-label">Selecione o arquivo PDF</label>
          <input type="file" class="form-control" id="arquivo2" name="arquivo2">
        </div><p></p><br></br>

        <div class="col-sm-12 mt-3">
        <p> Situação </p>
          <select id="situ" name="situ" class="form-control">
          <option value= "naoSelecionado" selected>Selecione a situação desse livro</option>
            <option value="1">Ativado</option>
            <option value="0">Desativado</option>
          </select>
        </div>

        <div class="col-sm-12 mt-3">
        <p> disponibilidade </p>
          <select id="disponibilidade" name="disponibilidade" class="form-control">
          <option value= "naoSelecionado" selected>Selecione a disponibilidade desse livro</option>
            <option value="retirado">Retirado</option>
            <option value="naoRetirado">Não retirado</option>
          </select>
        </div>

        <div class="col-md-12 mx-auto">
        <br><br>
          <label for="descricao" class="form-label"><h5>Sinópse</h5></label>
          <textarea class="form-control" rows="4" id="descricao" name="descricao" ></textarea>
        </div>
    
    
        <div class="col-12  mt-3">
      <button id="botao" type="submit" name="cadastrar" value="cadastrar" class="btn">Cadastrar</button>
      <br><br>
        </div>
        <div>
      </form>
	<?php
        $url = 'cadastroDeLivro.php';
        require_once "include/verificaTamanho.php";
try {

if (isset($_REQUEST["cadastrar"])) 
	
{
      $nome = $_REQUEST["nome"];
      $isbn = $_REQUEST["isbn"];
      $categoria = $_REQUEST["categoria"];
      $autor = $_REQUEST["autor"];
      $ano = $_REQUEST["ano"];
      $destaque = $_REQUEST["destaque"];
      $descricao = $_REQUEST["descricao"];
      $editora = $_REQUEST["editora"];
      $situacao = $_REQUEST["situ"];
      $disponibilidade = $_REQUEST["disponibilidade"];

      date_default_timezone_set('America/Sao_Paulo');
      $data = date("d-m-Y");
      $time = date("H-i-s");

      $nomeimg =     $_FILES["arquivo"]["name"];
      $temp =     $_FILES["arquivo"]["tmp_name"];
      $tamanho =  $_FILES["arquivo"]["size"];
      $tipoimg =     $_FILES["arquivo"]["type"];
      $erro =     $_FILES["arquivo"]["error"];
      $ext = pathinfo($nomeimg, PATHINFO_EXTENSION);

      $num = rand(1, 10000000000);

      $nomeimg2 =  $_FILES["arquivo2"]["name"];
      $temp2 =     $_FILES["arquivo2"]["tmp_name"];
      $tamanho2 =  $_FILES["arquivo2"]["size"];
      $tipoimg2 =  $_FILES["arquivo2"]["type"];
      $erro2 =     $_FILES["arquivo2"]["error"];
      $ext2 = pathinfo($nomeimg2, PATHINFO_EXTENSION);
      
      $certo = true;

      if ($tamanho > 0) {

        if (($ext != 'jpg') and  ($ext != 'png')) {
          echo "<script>
          Swal.fire({
              icon: 'error',
              title: 'A imagem tem que ter extensão png ou jpg!!',
              customClass: {
                  popup: 'swalFireLivro',
              },
              showConfirmButton: false,
              allowOutsideClick: false
          });
      
          // Redirecione automaticamente após um breve atraso
          setTimeout(function() {
              window.location.href = 'cadastroDeLivro.php';
          }, 4000);
          </script>";
          exit;
        }
  
        if ($tamanho > 9000000) {
          echo "<script>
          Swal.fire({
              icon: 'error',
              title: 'A imagem é muito pesada!!',
              customClass: {
                  popup: 'swalFireLivro',
              },
              showConfirmButton: false,
              allowOutsideClick: false
          });
      
          // Redirecione automaticamente após um breve atraso
          setTimeout(function() {
              window.location.href = 'cadastroDeLivro.php';
          }, 4000);
          </script>";
          exit;
        }
      }

      if($tamanho2 == 0){
        $arquivo2= 0;
        
      }else if($tamanho2 > 0){
          if (($ext2 != 'pdf')) {
              echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: 'O arquivo tem que ter extensão PDF!!',
                  customClass: {
                      popup: 'swalFireLivro',
                  },
                  showConfirmButton: false,
                  allowOutsideClick: false
              });
          
              // Redirecione automaticamente após um breve atraso
              setTimeout(function() {
                  window.location.href = 'cadastroDeLivro.php';
              }, 4000);
              </script>";
              exit;
            }
      }

      if((($tamanho2 >  0) || (!empty($_FILES["arquivo"]["name"])))) {
          if (!empty($_FILES["arquivo"]["name"])){
          $novo_nomeimg = 'img' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext;
          $mover = move_uploaded_file($temp, '../img/' . $novo_nomeimg);
          $arquivo = '../img/' . $novo_nomeimg;
          }

          if($tamanho2 > 0){
          $novo_nomeimg2 = 'arquivo' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext2;
          $arquivo2 = '../pdf/' . $novo_nomeimg2;
          $mover2 = move_uploaded_file($temp2, '../pdf/' . $novo_nomeimg2);

          }
      }
    
    if (empty($nome) || empty($isbn) || ($categoria == "naoSelecionado") || empty($autor) || empty($ano) || ($destaque == "naoSelecionado") || empty($descricao) || empty($editora) || ($destaque == "naoSelecionado") ||  ($disponibilidade == "naoSelecionado") ||  empty($_FILES['arquivo']['name'])) {
      $mensagem = "Campos obrigatórios em branco: ";
      
      if (empty($nome)) {
          $mensagem .= "Nome ";
      }

      if (empty($isbn)) {
        $mensagem .= "ISBN ";
      }

      if ( $categoria == "naoSelecionado") {
        $mensagem .= "Categoria ";
      }

      if (empty($autor)) {
          $mensagem .= "Autor ";
      }
      if (empty($ano)) {
          $mensagem .= "Ano ";
      }

      if ($destaque == "naoSelecionado") {
        $mensagem .= "Destaque ";
      }

      if (empty($descricao)) {
          $mensagem .= "Sinópse ";
      }

      if (empty($editora)) {
          $mensagem .= "Editora ";
      }

      if ($situacao == "naoSelecionado") {
        $mensagem .= "Situação ";
      }

      if ($disponibilidade == "naoSelecionado") {
        $mensagem .= "Disponibilidade ";
      }

      if (empty($_FILES['arquivo']['name'])) {
          $mensagem .= "Imagem ";
      }
      
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: '$mensagem não pode estar vazio!!!',
          customClass: {
              popup: 'swalFireLivro',
          },
          showConfirmButton: false,
          allowOutsideClick: false
      });
  
      // Redirecione automaticamente após um breve atraso
      setTimeout(function() {
          window.location.href = 'cadastroDeLivro.php';
      }, 4000);
      </script>";
    }


    $sql = $conn->prepare("INSERT INTO tbl_livro(id_liv, isbn, categoria, nome, autor, ano, destaque, descricao,  editora, arquivo, arquivo2, situacao ,disponibilidade)
    VALUES (:id_liv, :isbn, :categoria, :nome, :autor, :ano, :destaque, :descricao, :editora, :arquivo, :arquivo2, :situacao, :disponibilidade)");
    
            $sql->bindValue(':id_liv', null);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':isbn',$isbn);
            $sql->bindValue(':categoria',$categoria);
            $sql->bindValue(':autor',$autor);
            $sql->bindValue(':ano',$ano);
            $sql->bindValue(':destaque',$destaque);
            $sql->bindValue(':descricao',$descricao);
            $sql->bindValue(':editora',$editora);
            $sql->bindValue(':arquivo', $arquivo);
            $sql->bindValue(':arquivo2', $arquivo2);
            $sql->bindValue(':situacao', $situacao);
            $sql->bindValue(':disponibilidade', $disponibilidade);

        $sql->execute();
        echo "<script>
        Swal.fire({
            title: 'Cadastro realizado!!',
            customClass: {
                popup: 'swalFireLivro',
            },
            showCancelButton: true,
            confirmButtonText: 'Ir para a página de controle de livro',
            cancelButtonText: 'Ir para a página de controle de livro em PDF',
            timer: 4000,
            timerProgressBar: true,
            allowOutsideClick: false    
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'controleDeLivro.php';
            } else {
                window.location.href = 'controleDeLivroPDF.php';
            }
        });
    </script>";
    

  
       }
      }catch (PDOException $erro){
        echo $erro->getMessage();
    }
    require_once "include/footer.php";
    require_once "include/scrollTop.php";
?>
</body>

</html>