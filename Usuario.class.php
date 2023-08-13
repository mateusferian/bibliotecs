<?php
class Usuario
{
    public function login($email, $senha, $conn)
    {
        $sql = "SELECT * FROM tbl_cadastro_usuario WHERE email = :email";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            if ($senha === $dado['senha']) { // Comparação simples de senhas
                $_SESSION["id"] = $dado['id'];
                return true;
            }
        }

        return false;
    }

    public function buscarUsuarioPorId($conn, $id)
    {
        $sql = "SELECT * FROM tbl_cadastro_usuario WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}
?>

