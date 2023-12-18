<?php
require_once "include/header.php";
?>

<!-- css  -->
<link href="css/swalFireLivro.css" rel="stylesheet">
<link rel="stylesheet" href="css/botao.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
    $nomeDaPagina ="Alterar comentário";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";

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
                <label for="comentario" class="form-label"> Comentario: </label><br>
                <input type="comentario" name="comentario" class="form-control"
                    value="<?php if(isset($row['comentario'])) {echo $row['comentario'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control"
                    value="<?php if(isset($row['cargo'])) {echo $row['cargo'];} ?>"><br>
            </div>

            <div class="col-sm-6  mt-3">
        <div class="estrelas">
        <label for="comentario" class="form-label"> Avaliação: </label><br>
            <?php
                $originalRating = $row['estrela']; // Obtenha o valor da classificação do banco de dados
            ?>
            <input type="radio" id="vazio" name="estrela" value="" <?php echo ($originalRating === '') ? 'checked' : ''; ?>>
            <label for="estrela_um"><i class="fa"></i></label>
            <input type="radio" id="estrela_um" name="estrela" value="1" <?php echo ($originalRating == 1) ? 'checked' : ''; ?>>
            <label for="estrela_dois"><i class="fa"></i></label>
            <input type="radio" id="estrela_dois" name="estrela" value="2" <?php echo ($originalRating == 2) ? 'checked' : ''; ?>>
            <label for="estrela_tres"><i class="fa"></i></label>
            <input type="radio" id="estrela_tres" name="estrela" value="3" <?php echo ($originalRating == 3) ? 'checked' : ''; ?>>
            <label for="estrela_quatro"><i class="fa"></i></label>
            <input type="radio" id="estrela_quatro" name="estrela" value="4" <?php echo ($originalRating == 4) ? 'checked' : ''; ?>>
            <label for="estrela_cinco"><i class="fa"></i></label>
            <input type="radio" id="estrela_cinco" name="estrela" value="5" <?php echo ($originalRating == 5) ? 'checked' : ''; ?>><br><br>	
        </div>
    </div>

            <div class="col-12  mt-3">
                <button id="botao" type="submit" name="alterar" value="alterar"
                    class="btn btn-primary mt-2">Alterar</button>
                <br><br>
            </div>
        </div>
    </form>

    <script>
    const ratingInputs = document.querySelectorAll('input[type="radio"]');
    const ratingValue = document.getElementById('ratingValue');
    const originalRating = <?php echo $originalRating; ?>;

    // Inicializa a cor com base na classificação do banco de dados
    setStarColor(originalRating);

    ratingInputs.forEach(input => {
        input.addEventListener('change', () => {
            ratingValue.textContent = input.value;

            // Muda a cor das estrelas quando uma opção é selecionada
            setStarColor(input.value);
        });
    });

    function setStarColor(rating) {
        // Adapte isso de acordo com a lógica específica do seu código para mudar a cor
        ratingInputs.forEach(input => {
            const starLabel = input.nextElementSibling;
            starLabel.style.color = input.value <= rating ? 'yellow' : 'gray';
        });
    }
</script>

    <?php
try{
      if (isset($_REQUEST["alterar"])) {
        
    
        try {
                $id = $_REQUEST["id"];
                $nome = $_REQUEST["nome"];
                $comentario = $_REQUEST["comentario"];
                $cargo = $_REQUEST["cargo"];
                $estrela = $_REQUEST["estrela"];

                if($estrela == 1){
                    $avatar="../assets/img/imagemAvatar/1.png";
                  }else if($estrela == 2){
                    $avatar="../assets/img/imagemAvatar/2.png";
                  
                }else if($estrela == 3){
                    $avatar="../assets/img/imagemAvatar/3.png";
                
                }else if($estrela == 4){
                    $avatar="../assets/imagemAvatar/4.png";
            
                }else if($estrela == 5){
                    $avatar="../assets/imagemAvatar/5.png";
                }

                $sql = $conn->prepare("UPDATE tbl_comentario SET nome = :nome, comentario = :comentario, cargo = :cargo, estrela = :estrela, avatar = :avatar WHERE id = :id");
                
                $sql->bindValue(':id', $id);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':comentario', $comentario);
                $sql->bindValue(':cargo', $cargo);
                $sql->bindValue(':estrela', $estrela);
                $sql->bindValue(':avatar', $avatar);
        
                $sql->execute();

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Alteração de comentário realizada com sucesso!',
                    customClass: {
                        popup: 'swalFireLivro',
                    },
                    showCancelButton: false,
                    confirmButtonText: 'Ir para a página de controle de comentários',
                    timer: 4000,
                    timerProgressBar: true, 
                    allowOutsideClick: false    
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'controleComentario.php';
                    } else {
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