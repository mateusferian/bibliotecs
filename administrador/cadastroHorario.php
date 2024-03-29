<?php
require_once "include/header.php";
?>
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

    .botao-filtrar {
        background-color: rgba(0, 131, 116, 0.8);
        color: white;
        border: 2px solid rgba(0, 131, 116, 0.8);
    }

    /* Estilo de hover do botão */
    .botao-filtrar:hover {
        background-color: #99cdc7;
        color: white;
        border: 2px solid #99cdc7;
    }

    #meuBotao:active {
        background-color: #014d44;
        border: 2px solid #014d44;
        /* Cor quando o botão é clicado e segurado */
    }
    </style>
</head>
<body>

<?php
    $nomeDaPagina ="Cadastro de horarios";
    require_once "../restrito.php";
    require_once "include/navbar.php";
    require_once "include/nomePagina.php";
?>


<script>
    AOS.init();
    </script>

<form name="form" method="post" action="cadastroHorario.php">
  <div class="col-sm-12 mt-3">
    <label for="dia" class="form-label">Dia</label>
    <select id="dia" name="dia" class="form-control">
      <option selected>Selecione um dia da semana</option>
      <option value="segunda-feira">Segunda-feira</option>
      <option value="terca-feira">Terça-feira</option>
      <option value="quarta-feira">Quarta-feira</option>
      <option value="quinta-feira">Quinta-feira</option>
      <option value="sexta-feira">Sexta-feira</option>
    </select>
  </div>

  <div class="col-sm-12 mt-3">
    <label for="periodo" class="form-label">Período</label>
    <select id="periodo" name="periodo" class="form-control">
      <option selected>Selecione um periodo</option>
      <option value="Manha">Manhã</option>
      <option value="Tarde">Tarde</option>
      <option value="Noite">Noite</option>
    </select>
  </div>

  <div class="col-sm-12 mt-3">
    <label for="horario" class="form-label">Horário de inicio</label>
    <input type="text" name="horario" class="form-control" placeholder="Digite o horário de inicio">
  </div>

  <div class="col-sm-12 mt-3">
    <label for="termino" class="form-label">Horário de termino</label>
    <input type="text" name="termino" class="form-control" placeholder="Digite o horário de termino">
  </div>

  <div class="col-12  mt-3">
      <button id="botao" type="submit" name="cadastrar" value="cadastrar" class="btn">Cadastrar</button>
      <br><br>
        </div>
</form>

    <?php

try {

    if (isset($_REQUEST["cadastrar"])) {

      $dia = $_REQUEST["dia"];
      $periodo = $_REQUEST["periodo"];
      $horario = $_REQUEST["horario"];
      $termino = $_REQUEST["termino"];
      
  
        $sql = $conn->prepare("INSERT INTO tbl_horario (id, dia, periodo, horario, termino)
                            VALUES (:id, :dia, :periodo	, :horario, :termino) ");
        
        $sql->bindValue(':id', null);
        $sql->bindValue(':dia', $dia);
        $sql->bindValue(':periodo', $periodo);
        $sql->bindValue(':horario',$horario);
        $sql->bindValue(':termino',$termino);
        
        $sql->execute();
        echo "<script>
        Swal.fire({
            title: 'Cadastro realizado com sucesso!',
            customClass: {
                popup: 'swalFireLivro',
            },
            showCancelButton: false,
            confirmButtonText: 'Ir para a página de controle de horários',
            timer: 4000,
            timerProgressBar: true,
            allowOutsideClick: false    
              
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'controleDeHorario.php';
            }
            
        });
    </script>";
    }
      }
      catch (PDOException $erro) {
          echo $erro->getMessage();
      }
    
      require_once "include/footer.php";
      require_once "include/scrollTop.php";
  ?>
  </body>
  
  </html>