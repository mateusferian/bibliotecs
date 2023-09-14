<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if((!isset($_SESSION['nome'])) and (!isset($_SESSION['email']))){
            echo "<script language=javascript>
            alert('ALERTA, VOCÊ NÃO TEM PERMISSÃO!');
            location.href = '../index.php';
            </script>";
            
        }
    ?>
</body>
</html>