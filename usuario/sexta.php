<?php
    require_once "include/header.php";
    
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
  .img_novidades{
    max-width: 80%;
    height: auto;
  }

  .img_tamanho{
    max-width: 300px;
    height: auto;
  }

  topo{
  margin-top: 80px;
  margin-bottom: 40px;

}
h1{
color: black;
font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.branco{
  color: white;
font-family: Verdana, Geneva, Tahoma, sans-serif;
  width: 100%;
}
.border
{
  border: 1px solid white;
}
li{
  font-size: larger;
}
  

</style>


  <!-- =======================================================
  * Template Name: Impact
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php
    $nomeDaPagina ="Horários de Funcionamento";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
    ?>

<div class="container">

    <!-- TENTATIVA DE MENU HORIZONTAL -->

    <style>
        #botao {
            background-color: rgba(0, 131, 116, 0.8);
            color: white;
            border: 2px solid rgba(0, 131, 116, 0.8);
        }

        #botao:hover {
            background-color: #99cdc7;
            color: white;
            border: 2px solid #99cdc7;
        }

        #botao:active {
            background-color: #014d44;
            border: 2px solid #014d44;
        }

        .link {
            background-color: rgba(0, 131, 116, 0.8);
            color: white;
            border: 2px solid rgba(0, 131, 116, 0.8);
        }

        .link:hover {
            background-color: #99cdc7;
            color: white;
            border: 2px solid #99cdc7;
        }

        .link:active {
            background-color: #014d44;
            border: 2px solid #014d44;
        }
    </style>

<div class="container mt-5">
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dias da Semana</h5>
                <p class="card-text">
                    <a href="segunda.php" class="btn btn-primary link" id="botao">Segunda</a>
                    <a href="terca.php" class="btn btn-primary link" id="botao">Terça</a>
                    <a href="quarta.php" class="btn btn-primary link" id="botao">Quarta</a>
                    <a href="quinta.php" class="btn btn-primary link" id="botao">Quinta</a>
                    <a href="sexta.php" class="btn btn-primary link" id="botao">Sexta</a>
                </p>
            </div>
        </div>
    </div>
</div>

    
    
    <script>
        function toggleTable() {
            var table = document.getElementById("myTable");
if (table.style.display === "none") {
table.style.display = "table";
            } else {
table.style.display = "none";
            }
        }
    </script>
</head>
<body>
    
    <?php
    if (isset($_POST['showTableButton'])) {
        echo "<table border='1' id='myTable' style='display:none;'>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<tr><td>Linha $i</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
    
    <?php
    if (isset($_POST['showTableButton'])) {
        echo "<table border='1' id='myTable' style='display:none;'>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<tr><td>Linha $i</td></tr>";
        }
        echo "</table>";
    }
    $horario = "0";

    ?>
    
</body>
</html>
<?php
        $consultaManha = $conn->prepare("SELECT * FROM tbl_horario WHERE dia ='sexta-Feira' AND  periodo ='Manha'");
        $consultaManha->execute();

        $consultaTarde = $conn->prepare("SELECT * FROM tbl_horario WHERE dia ='sexta-Feira' AND  periodo ='Tarde'");
        $consultaTarde->execute();

        $consultaNoite = $conn->prepare("SELECT * FROM tbl_horario WHERE dia ='sexta-Feira' AND  periodo ='Noite'");
        $consultaNoite->execute();

        
?>
    <br><br><br>
        <div class="card">
          <div class="card-header">
           <center><h2>Horários de Sexta-Feira</h2></center>
          </div>
          <div class="card-body">
            <div class="row">
            
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Manhã</h4></center>
               </div>
               
              <div class="card-body">
                <?php
        while ($rowManha = $consultaManha->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <center><p class="card-text"> <br><br> <?php echo $rowManha["horario"] ?>  -- <?php echo $rowManha["termino"] ?>  <br></p></center>
      <?php
        }
                ?>
              </div>
            </div>
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Tarde</h4></center>
               </div>
              <div class="card-body">
              <?php
        while ($rowTarde = $consultaTarde->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <center><p class="card-text"> <br><br> <?php echo $rowTarde["horario"] ?>  -- <?php echo $rowTarde["termino"] ?>  <br></p></center>
      <?php
        }
                ?>
              </div>
            </div>
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Noite</h4></center>
               </div>
              <div class="card-body">
              <?php
        while ($rowNoite = $consultaNoite->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <center><p class="card-text"> <br><br> <?php echo $rowNoite["horario"] ?> -- <?php echo $rowNoite["termino"] ?> <br></p></center>
      <?php
        }
                ?>
              </div>
            </div>
  
            </div>
          </div>
        </div>
  
    </div>
  
  </body>
  </html>
  
    </p>
   </div>
  </div>
</div>

    </div>
   <div class="swiper-pagination"></div>
  </div>
</div>
    
 
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<br><br><br>
<?php
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>

</body>

</html>