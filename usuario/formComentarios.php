<?php
    require_once "../restrito.php";
    require_once "include/header.php";
?>
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/formularioComentario.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style>
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
    <main>
        <?php
    require_once "include/navbar.php";
?>
    <?php
    if(isset($_SESSION['msg'])){
    echo $_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
    }
    ?>
<script>
    AOS.init();
    </script>

    </div>
    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="formComentarios.php" method="POST" name="formulario">
                    <br><br>

    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control"
         placeholder="digite o seu e-mail institucional" required="">
        </div>
    </div>


    <div class="form-group">
    <div class="col-md-6 offset-md-3">
    <label>cargo</label>
    <input type="text" name="cargo" class="form-control"
     placeholder="digite o seu e-mail institucional" required="">
     </div>
    </div>


    <div class="form-group">
    <div class="col-md-6 offset-md-3">
    <div class="input-group-label">
        <label for="informacoes" class="form-label">Faça seu comentário</label>
        <textarea  class="form-control" id="informacoes" name="comentario" rows="5" cols="42"
        placeholder="Escreva seu cometário sobre o site."
        style="max-height: 50px; overflow-y: auto; resize: vertical;"
        required></textarea>
</div>
</div>
    </div>

    <div class="form-group">
    <div class="col-md-6 offset-md-3">
    <div class="estrelas">
		<input type="radio" id="vazio" name="estrela" value="" checked>
		<label for="estrela_um"><i class="fa"></i></label>
		<input type="radio" id="estrela_um" name="estrela" value="1">
				
		<label for="estrela_dois"><i class="fa"></i></label>
		<input type="radio" id="estrela_dois" name="estrela" value="2">
				
		<label for="estrela_tres"><i class="fa"></i></label>
		<input type="radio" id="estrela_tres" name="estrela" value="3">
				
		<label for="estrela_quatro"><i class="fa"></i></label>
		<input type="radio" id="estrela_quatro" name="estrela" value="4">
				
		<label for="estrela_cinco"><i class="fa"></i></label>
		<input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>	
		</div>
        </div>
</div>

        <div class="form-group">
                            <div class="col-md-5 offset-md-5">
        <input type="submit" value="Cadastrar" class="button-submit" name="Cadastrar">
        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const ratingInputs = document.querySelectorAll('input[type="radio"]');
        const ratingValue = document.getElementById('ratingValue');

        ratingInputs.forEach(input => {
            input.addEventListener('change', () => {
                ratingValue.textContent = input.value;
            });
        });
    </script>
<?php
  require_once "../conexao.php";
if (isset($_REQUEST["Cadastrar"])) {
      $nome = $_REQUEST["nome"];
      $comentario = $_REQUEST["comentario"];
      $cargo = $_REQUEST["cargo"];
      $estrela = $_REQUEST["estrela"];

      if($estrela == 1){
        $avatar="imagemAvatar/1";
      }else if($estrela == 2){
        $avatar="imagemAvatar/2";
      
    }else if($estrela == 3){
        $avatar="imagemAvatar/3";
    
    }else if($estrela == 4){
        $avatar="imagemAvatar/4";

    }else if($estrela == 5){
        $avatar="imagemAvatar/5";
    }

      try{ 
  
        $sql = $conn->prepare("INSERT INTO tbl_comentario (id, nome, comentario, cargo, estrela, avatar)
                            VALUES (:id, :nome, :comentario, :cargo, :estrela, :avatar) ");
        
        $sql->bindValue(':id', null);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':comentario', $comentario);
        $sql->bindValue(':cargo', $cargo);
        $sql->bindValue(':estrela', $estrela);
        $sql->bindValue(':avatar', $avatar);

        $sql->execute();
    
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Comentario cadastrado com sucesso!',
            customClass: {
                popup: 'swalFireControleDeAlunoApagado',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        // Redirecione automaticamente após um breve atraso
        setTimeout(function() {
            window.location.href = 'home.php';
        }, 4000);
         </script>";

    } 
    catch (PDOException $erro) {
        echo $erro->getMessage();
    }
  }
        ?>
            <?php
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>
        </body>
</html>