<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <?php
    require_once "conexao.php";

    try{
        if (isset($_REQUEST["acessar"])) {

            $email = $_REQUEST['email'];
            $senhas = $_REQUEST['senha'];

            $consulta = $conn->prepare("SELECT * FROM  tbl_administrador WHERE email=:email;");

            $consulta->bindValue(':email' , $email);
            $consulta->execute();
            $row = $consulta->fetch(PDO::FETCH_ASSOC);

            $total_rows = $consulta ->rowCount();
         
            if($total_rows > 0 && password_verify($senhas, $row['senha'])){
                
                session_start();

                $_SESSION['email'] = $row['email'];
                
                $_SESSION['senha'] = $row['senha'];
                
                $_SESSION['nome'] = $row['nome'];
            

                if($row['tipo'] == '2'){
                    header(("location:admin/controleDeAluno.php"));
                }
    
                if($row['tipo'] == '0'){
                    header(("location:inicio_usuario.php"));
                }

            } else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'email ou senha incorretos',
                    customClass: {
                        popup: 'swalFireIndex', // Classe CSS personalizada para a caixa de diálogo
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false  
                });
        
                // Redirecione automaticamente após um breve atraso
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 3000); // Tempo em milissegundos (2 segundos no exemplo) antes de redirecionar
            </script>";
            }
        }

    }  catch (PDOException $erro) {
        echo $erro->getMessage();
      }
  ?>
    
</body>
</html>