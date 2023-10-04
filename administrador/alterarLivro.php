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
   
</style>

</head>
<body>

<?php
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/hero.php";
    require_once "../conexao.php";
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

<form name="form" method="post" action="alterarLivro.php"  enctype="multipart/form-data">

<label> ID: </label><br>
<input type="text" name="id_liv" value="<?php if(isset($row['id_liv'])) {echo $row['id_liv'];} ?>"readonly="readonly" ><br>
   <br><br> 
   <label>Nome </label><br>
<input type="text" name="nome" value="<?php if(isset($row['nome'])) {echo $row['nome'];} ?>"><br>
   <br><br> 

   <label> Isbn: </label><br>
<input type="text" name="isbn" value="<?php if(isset($row['isbn'])) {echo $row['isbn'];} ?>"><br>
   <br><br> 
   <label> Categoria: </label><br>
<select name="categoria" value="<?php if(isset($row['categoria'])) {echo $row['categoria'];} ?>" id="categoria">
          <option value="Romance">Românce</option>
            <option value="Ficção">Ficção</option>
            <option value="Drama">Drama</option>
            <option value="Religioso">Religioso</option>
            <option value="Conto">Conto</option>
            <option value="Liter.brasileira">Liter.brasileira</option>
            <option value="Terror">Terror</option>
            <option value="Suspense">Suspense</option>
          </select> 

<br><br> 

   <label> Autor: </label><br>
<input type="text" name="autor" value="<?php if(isset($row['autor'])) {echo $row['autor'];} ?>"><br>
   <br><br> 

   <label> Ano: </label><br>
<input type="text" name="ano" value="<?php if(isset($row['ano'])) {echo $row['ano'];} ?>"><br>
   <br><br> 

   <label> Destaque: </label><br>
   <select name="destaque" value="<?php if(isset($row['destaque'])) {echo $row['destaque'];} ?> " id="destaque">
    <option value="S" >S</option>
    <option value="N" >N </option>
</select><br>


<label> Descrição: </label><br>
<input type="text" name="descricao" value="<?php if(isset($row['descricao'])) {echo $row['descricao'];} ?>" id="descricao">
<br><br>



   <label> Editora: </label><br>
<input type="text" name="editora" value="<?php if(isset($row['editora'])) {echo $row['editora'];} ?>" id="editora">
<br><br>
   <label> Arquivo: </label><br>
<input type="file" name="arquivo" value="<?php if(isset($row['arquivo'])) {echo $row['arquivo'];} ?>"><br>
   <br><br> 

   <label> PDF: </label><br>
<input type="file" name="arquivo2" value="<?php if(isset($row['arquivo2'])) {echo $row['arquivo2'];} ?>"><br>
   <br><br> 

</div>

<input type="hidden" name="caminho_arquivo" value="<?php if(isset($row['arquivo'])) { echo $row['arquivo']; } ?>">


<div class="col-12  mt-3">
      <button type="submit" name="alterar" value="alterar" class="btn meuBotao">Alterar</button>
      <br><br>
        </div></form>



<?php
try{
	if(isset($_REQUEST["alterar"]))	
	{
		//Recebe os dados do formulario
    $nome = $_REQUEST["nome"];
    $isbn = $_REQUEST["isbn"];
    $categoria = $_REQUEST["categoria"];
    $autor = $_REQUEST["autor"];
    $ano = $_REQUEST["ano"];
    $destaque = $_REQUEST["destaque"];
    $descricao = $_REQUEST["descricao"];
    $editora = $_REQUEST["editora"];
  

    	// CÓDIGO UPLOAD imagem

      //definindo timezone - data e hora

      date_default_timezone_set('America/Sao_Paulo');

      $data = date("d-m-Y");

      $time = date("H-i-s");

 

      // função random

      $num = rand(1, 10000000000);

 

      //verifica o arquivo para upload

      $nomeimg =  $_FILES["arquivo"]["name"];

      $temp =     $_FILES["arquivo"]["tmp_name"];

      $tamanho =  $_FILES["arquivo"]["size"];

      $tipoimg =  $_FILES["arquivo"]["type"];

      $erro =     $_FILES["arquivo"]["error"];

 

      //verifica a extensao do arquivo

      $ext = pathinfo($nomeimg, PATHINFO_EXTENSION);

 

   

      //renomear o nome da imagem

      $novo_nomeimg = 'img' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext;

 

      //Comando para mover o arquivo para a pasta

      $mover = move_uploaded_file($temp, 'img/' . $novo_nomeimg);

 

 

      //CRIANDO CAMINHO DO ARQUIVO

      $arquivo = 'img/' . $novo_nomeimg;

   

 

  // CÓDIGO UPLOAD PDF

      //definindo timezone - data e hora

      date_default_timezone_set('America/Sao_Paulo');

      $data = date("d-m-Y");

      $time = date("H-i-s");

 

      // função random

      $num = rand(1, 10000000000);

 

      //verifica o arquivo para upload

      $nomeimg2 =  $_FILES["arquivo2"]["name"];

      $temp2 =     $_FILES["arquivo2"]["tmp_name"];

      $tamanho2 =  $_FILES["arquivo2"]["size"];

      $tipoimg2 =  $_FILES["arquivo2"]["type"];

      $erro2 =     $_FILES["arquivo2"]["error"];

 

      //verifica a extensao do arquivo

      $ext2 = "pdf";


      //renomear o nome da imagem

      $novo_nomeimg2 = 'arquivo' . '_' . $data . '_' . $time . '_' . $num . '.' . $ext2;

 

      //Comando para mover o arquivo para a pasta

      $mover2 = move_uploaded_file($temp2, 'pdf/' . $novo_nomeimg2);

      //CRIANDO CAMINHO DO ARQUIVO

      $arquivo2 = 'pdf/' . $novo_nomeimg2;




$sql = $conn->prepare("UPDATE tbl_livro SET id_liv =:id_liv, nome =:nome, isbn =:isbn, categoria =:categoria , autor =:autor, 
ano =:ano , destaque =:destaque , descricao =:descricao, editora =:editora , arquivo =:arquivo ,  arquivo2 =:arquivo2  where id_liv =:id_liv");				

 //passagem de parametros para a tabela
 $sql->bindValue(':id_liv', $idlivro);
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
       title: 'Alteração realizada!!',
       html: '<p>Clique voltar para página de Controle de Livro.</p>',
       customClass: {
           popup: 'swalFireLivro', // Classe CSS personalizada para a caixa de diálogo
       },
       showCancelButton: false, // Não mostrar o botão de cancelar
       confirmButtonText: 'Ir para a página de Controle De livros',
       timer: 2000, // Defina o temporizador para  segundos (3000 milissegundos)
       timerProgressBar: true, // Mostrar a barra de progresso do temporizador
       allowOutsideClick: false    
         
   }).then((result) => {
       if (result.isConfirmed) {
           // Redirecionar para a página de login
           window.location.href = 'controleDeLivro.php';
       }
       
   });
</script>";


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