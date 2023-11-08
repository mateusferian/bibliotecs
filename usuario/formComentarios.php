<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecs</title>

    <link href="../bootstrap/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrapJS/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/formularioComentario.css">
    <link rel="stylesheet" href="css/swalFire.css">
    <link rel="stylesheet" href="css/botao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="imagensDeFundo/logo.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comentarios.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="icon" type="image/svg" sizes="16x16" href="card-heading.svg">
    <title> Comentários </title>

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



    <div class="input-group-label">
        <label for="informacoes">Faça seu comentário</label>
        <textarea id="informacoes" name="comentario" rows="5" cols="42"
        placeholder="Escreva seu cometário sobre o site."
        style="max-height: 50px; overflow-y: auto; resize: vertical;"
        required></textarea>
</div>


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

      try{ 
  
        $sql = $conn->prepare("INSERT INTO tbl_comentario (id, nome, comentario, cargo, estrela)
                            VALUES (:id, :nome, :comentario, :cargo, :estrela) ");
        
        $sql->bindValue(':id', null);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':comentario', $comentario);
        $sql->bindValue(':cargo', $cargo);
        $sql->bindValue(':estrela', $estrela);

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
        </body>
</html>