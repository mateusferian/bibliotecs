<?php
session_start();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])
    && isset($_POST['tipo']) && !empty($_POST['tipo'])) {
    require 'conexao.php';
    require 'Usuario.class.php';

    $u = new Usuario;

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $tipo = $_POST['tipo'];

    if ($u->login($email, $senha, $conn)) {
        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
            verificaTipoUsuario($conn, $id, $tipo); // Passando $conn, $id e $tipo como argumentos
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

function verificaTipoUsuario($conn, $id, $tipo){
    $u = new Usuario;
    $usuario = $u->buscarUsuarioPorId($conn, $id);

    if ($usuario && $usuario['tipo'] == $tipo) {
        if ($tipo == "1") {
            header("Location: home_aluno.php"); // Redirecionar para a página do aluno
            exit();
        } elseif ($tipo == "2") {
            header("Location: admin/controleDeAluno.php"); // Redirecionar para a página do professor
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>

