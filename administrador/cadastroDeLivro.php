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

    .meuBotao {
        background-color: rgba(0, 131, 116, 0.8);
        color: white;
        border: 2px solid rgba(0, 131, 116, 0.8);
    }

    /* Estilo de hover do botão */
    .meuBotao:hover {
        background-color: #99cdc7;
        color: white;
        border: 2px solid #99cdc7;
    }

    #meuBotao:active {
        background-color: #014d44;
        border: 2px solid #014d44;
    }
    </style>
</head>
<body>
<?php
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/hero.php";
    require_once "../conexao.php";
?>
<script>
    AOS.init();
    </script>

<br>
      <h1 class="text-center">Cadastro de Livros</h1>  

   <form name="form1" method="post" action="cadastroDeLivro.php" enctype="multipart/form-data">
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
            <option selected>Selecione o gênero</option>
            <option value="Romance">Românce</option>
            <option value="Ficção">Ficção</option>
            <option value="Drama">Drama</option>
            <option value="Religioso">Religioso</option>
            <option value="Conto">Conto</option>
            <option value="Liter.brasileira">Literatura Brasileira</option>
            <option value="Terror">Terror</option>
            <option value="Suspense">Suspense</option>
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

        <div class="col-sm-4 mt-3">
        <label for="destaque" class="form-label">Destaque</label>
          <select id="destaque" name="destaque" class="form-control">
            <option selected>Informe se o produto é destaque</option> 
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
        </div> 
  
        <div class="col-sm-8   mt-3">
          <label for="imagem" class="form-label">Selecione a Imagem</label>
          <input type="file" class="form-control" id="arquivo" name="arquivo">
        </div>
		
		  <div class="col-sm-6   mt-3">
          <label for="imagem" class="form-label">Selecione o arquivo PDF</label>
          <input type="file" class="form-control" id="arquivo2" name="arquivo2">
        </div><p></p><br></br>

        <div class="col-md-7 mx-auto">
          <label for="descricao" class="form-label"><h5>Sinópse</h5></label>
          <textarea class="form-control" rows="4" id="descricao" name="descricao" ></textarea>
        </div>
    
    
        <div class="col-12  mt-3">
      <button type="submit" name="cadastrar" value="cadastrar" class="btn meuBotao">Cadastrar</button>
      <br><br>
        </div>
        <div>
      </form>
	<?php

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

      date_default_timezone_set('America/Sao_Paulo');

      $data = date("d-m-Y");

      $time = date("H-i-s");

      $num = rand(1, 10000000000);

      $nomeimg =  $_FILES["arquivo"]["name"];

      $temp =     $_FILES["arquivo"]["tmp_name"];

      $tamanho =  $_FILES["arquivo"]["size"];

      $tipoimg =  $_FILES["arquivo"]["type"];

      $erro =     $_FILES["arquivo"]["error"];

      $ext = pathinfo($nomeimg, PATHINFO_EXTENSION);

      $novo_nomeimg = 'img' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext;

      $mover = move_uploaded_file($temp, 'img/' . $novo_nomeimg);

      $arquivo = 'img/' . $novo_nomeimg;

      date_default_timezone_set('America/Sao_Paulo');

      $data = date("d-m-Y");

      $time = date("H-i-s");

      $num = rand(1, 10000000000);


    $arquivo2 = $_REQUEST = ["arquivo2"];
      
      $nomeimg2 =  $_FILES["arquivo2"]["name"];
      $temp2 =     $_FILES["arquivo2"]["tmp_name"];
      $tamanho2 =  $_FILES["arquivo2"]["size"];
      $tipoimg2 =  $_FILES["arquivo2"]["type"];
      $erro2 =     $_FILES["arquivo2"]["error"];
      
      $ext2 = "pdf";
      $novo_nomeimg2 = 'arquivo' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext2;
      $arquivo2 = 'pdf/' . $novo_nomeimg2;

      $mover2 = move_uploaded_file($temp2, 'pdf/' . $novo_nomeimg2);
     

    if($tamanho2==0){
      $arquivo2= 0;
    }
    
               $sql = $conn->prepare("INSERT INTO tbl_livro(id_liv, isbn, categoria, nome, autor, ano, destaque, descricao,  editora, arquivo, arquivo2)
               VALUES (:id_liv, :isbn, :categoria, :nome, :autor, :ano, :destaque, :descricao, :editora, :arquivo, :arquivo2) ");
           
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

        $sql->execute();
        echo "<script>
        Swal.fire({
            title: 'Cadastro realizado!!',
            html: '<p>Clique alterar para alterar dados do Cadastro.</p>',
            customClass: {
                popup: 'swalFireLivro', // Classe CSS personalizada para a caixa de diálogo
            },
            showCancelButton: false, // Não mostrar o botão de cancelar
            confirmButtonText: 'Ir para a página de  alterar Cadastro',
            timer: 2000, // Defina o temporizador para 3 segundos (3000 milissegundos)
            timerProgressBar: true, // Mostrar a barra de progresso do temporizador
            allowOutsideClick: false    
              
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirecionar para a página de login
                window.location.href = 'alterar.php';
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