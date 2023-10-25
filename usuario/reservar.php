<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_bibliotecs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $data = $_POST["rm"];
    $horario = $_POST["turma"];
   

    // Verifique se o horário já está ocupado
    $check_sql = "SELECT * FROM reservar WHERE id = '$id' AND nome = '$nome'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<script language=javascript>
            alert('Desculpe, este horário já está ocupado.!!');
            location.href = 'home.php';
            </script>";
    } else {
        // Inserir agendamento no banco de dados
        $insert_sql = "INSERT INTO reservar (id, nome, rm,  turma) VALUES ('$id', '$nome', '$rm', '$turma')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "<script language=javascript>
            alert('Agendamento criado com sucesso !!');
            location.href = 'home.php';
            </script>";
            
        } else {
            echo "<script language=javascript>
            alert('Erro ao criar agendamento: !!');
            location.href = 'detalhes.php';
            </script>";
            $conn->error;
        }
    }

   
    // Feche a conexão com o banco de dados
    $conn->close();
}
?>
