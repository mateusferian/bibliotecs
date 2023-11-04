<?php
require_once "../restrito.php";
require_once "include/header.php";

if (isset($_REQUEST["id"])) {
    $idLivro = $_REQUEST["id"];
    $idAluno = $_SESSION["id"];
    $disponibilidade = "retirado";


    $consultaReserva = $conn->prepare("SELECT * FROM tbl_reservado WHERE idLivro = :idLivro AND idAluno = :idAluno ");
    $consultaReserva->bindValue(':idLivro', $idLivro);
    $consultaReserva->bindValue(':idAluno', $idAluno);
    $consultaReserva->execute();
    $rowReserva = $consultaReserva->fetch(PDO::FETCH_ASSOC);


    $dataAtual = $rowReserva["dataDeEntrega"];

    $dateTimeAtual = new DateTime($dataAtual);

    $dateTimeAtual->modify('+7 days');

    $dataDeEntrega = $dateTimeAtual->format('Y-m-d');

    try {
        $sql = $conn->prepare("UPDATE tbl_livro SET disponibilidade = :disponibilidade  WHERE id_liv = :id_liv");

        $sql->bindValue(':id_liv', $idLivro);
        $sql->bindValue(':disponibilidade', $disponibilidade);

        $sql->execute();
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }

    try {
        $sql = $conn->prepare("UPDATE tbl_reservado SET dataDeEntrega = :dataDeEntrega  WHERE idLivro = :idLivro");

        $sql->bindValue(':dataDeEntrega', $dataDeEntrega);
        $sql->bindValue(':idLivro', $idLivro);

        $sql->execute();

        $bytes = random_bytes(7);
        $valorErro = bin2hex($bytes);

        header("Location: retirados.php?renovado=" . urlencode($valorErro));
        exit;
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
}

