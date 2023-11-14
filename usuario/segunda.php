<?php
    require_once "include/header.php";
?>

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
    $nomeDaPagina ="Horarios";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
    ?>

<div class="container">
        <h1 class="topo">Bibliotecs</h1>
        <!DOCTYPE html>

    <!-- TENTATIVA DE MENU HORIZONTAL -->
  
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="segunda.php">Segunda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="terça.php">Terça</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quarta.php">Quarta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quinta.php">Quinta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sexta.php">Sexta</a>
          </li>
          <li class="nav-item">
        </ul>
      </div>
    </nav>
    
    01
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


    
    ?>
    
</body>
</html>


    
        <div class="card">
          <div class="card-header">
           <center><h2>Horários de funcionamento</h2></center>
          </div>
          <div class="card-body">
            <div class="row">
            
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Manhã</h4></center>
               </div>
               
              <div class="card-body">
                <center><p class="card-text"> <br><br> <?php echo $horarioManha; ?>  <br></p></center>
              </div>
            </div>
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Tarde</h4></center>
               </div>
              <div class="card-body">
                <center><p class="card-text"><br>  <?php echo $horarioTarde; ?>  <br>  <br></p></center>
              </div>
            </div>
  
            <div class="card m-2 p-5" style="width: 22rem;">
              <div class="card-header">
                <center><h4>Noite</h4></center>
               </div>
              <div class="card-body">
                <center><p class="card-text"><br>  <?php echo $horarioNoite; ?>  <br>  <br></p></center>
              </div>
            </div>
  
            </div>
          </div>
        </div>
  
    </div>
  
  </body>
  </html>
  
     <i class="bi bi-quote quote-icon-right"></i>
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
<?php
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
?>

</body>

</html>