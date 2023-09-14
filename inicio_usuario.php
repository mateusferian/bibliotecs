<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "restrito.php";
    ?>

<h1> Bbem vindo a Area do Usuario</h1>
<p><?php  echo "email:" . $_SESSION["email"]. "<BR>";?></p>
<p><?php  echo "nome:" . $_SESSION["nome"]. "<BR>";?></p>
<p><?php  echo "Sessão:" .session_id();?></p>
<br>
<a href="alterarsenha.php"> alterar senha</a>
<br>

<a href="sair.php"> sair</a>
</body>
</html>