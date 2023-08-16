    <?php

    session_start();
//variavéis de conexão
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bd_biblioteca";

    global $conn;

    try{

        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $erro) {
        header("Ocorreu o seguinte erro: " . $erro->getMessage());
    }

    ?>