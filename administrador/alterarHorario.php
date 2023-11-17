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
    $nomeDaPagina ="Alterar Horario";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
try{
   if(isset($_REQUEST["al"])) {
    
  $id = $_REQUEST["al"];
  $consulta = $conn->prepare("SELECT * FROM tbl_horario where id=:id;");
  $consulta->bindValue(':id', $id);
  $consulta->execute();
  $row=$consulta -> fetch(PDO::FETCH_ASSOC);
  }
  
  }
  
  catch (PDOException $erro){
  	echo $erro->getMessage();
  }
?>

    <form name="form" method="post" action="alterarHorario.php" enctype="multipart/form-data">
        <div class="row">

            <div class="col-sm-12  mt-3">
                <label for="id" class="form-label"> ID: </label><br>
                <input type="text" name="id" class="form-control"
                    value="<?php if(isset($row['id'])) {echo $row['id'];} ?>" readonly="readonly"><br>
            </div>

            <div class="col-sm-12 mt-3">
                <label for="dia" class="form-label">Dia</label>
                <select name="dia" class="form-control" id="dia">
                    <option value="segunda-feira" <?php echo ($row['dia'] === "Segunda-feira") ? 'selected' : ''; ?>>
                        Segunda-feira</option>
                    <option value="terca-feira" <?php echo ($row['dia'] === "Terça-feira") ? 'selected' : ''; ?>>
                        Terça-feira</option>
                    <option value="quarta-feira" <?php echo ($row['dia'] === "Quarta-feira") ? 'selected' : ''; ?>>
                        Quarta-feira</option>
                    <option value="quinta-feira" <?php echo ($row['dia'] === "Quinta-feira") ? 'selected' : ''; ?>>
                        Quinta-feira</option>
                    <option value="sexta-feira" <?php echo ($row['dia'] === "Sexta-feira") ? 'selected' : ''; ?>>
                        Sexta-feira</option>
                </select>
            </div>



            <div class="col-sm-12  mt-3">
                <label for="periodo" class="form-label">Periodo</label>
                <select name="periodo" class="form-control"
                    value="<?php if(isset($row['periodo'])) {echo $row['periodo'];} ?>" id="dia">
                    <option value="Manha">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>

            <div class="col-sm-12  mt-3">
                <label for="horario" class="form-label">Horário de inicio</label>
                <input type="text" name="horario" class="form-control"
                    value="<?php if(isset($row['horario'])) {echo $row['horario'];} ?>"><br>
            </div>

            <div class="col-sm-12 mt-3">
                <label for="termino" class="form-label">Horário de termino</label>
                <input type="termino" name="termino" class="form-control"
                value="<?php if(isset($row['termino'])) {echo $row['termino'];} ?>"><br>
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
        if (isset($_POST["alterar"])) {
            $id = $_POST["id"];
            $dia = $_POST["dia"];
            $periodo = $_POST["periodo"];
            $horario = $_POST["horario"];
            $termino = $_POST["termino"];

     try{
            $sql = $conn->prepare("UPDATE tbl_horario SET dia = :dia, periodo = :periodo, horario = :horario, termino = :termino WHERE id = :id");
                    
            $sql->bindValue(':id', $id); // Certifique-se de vincular o ID como inteiro, se for o caso.
            $sql->bindValue(':dia', $dia);
            $sql->bindValue(':periodo', $periodo);
            $sql->bindValue(':horario', $horario);
            $sql->bindValue(':termino', $termino);
            
            $sql->execute();
        

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Alteração realizado!!',
                    customClass: {
                        popup: 'swalFireLivro',
                    },
                    showCancelButton: false,
                    confirmButtonText: 'Ir para a página de controle de horario',
                    timer: 4000,
                    timerProgressBar: true, 
                    allowOutsideClick: false    
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'controleDeHorario.php';
                    }else{
                        window.location.href = 'controleDeHorario.php';
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