
  <?php
  include_once 'include/header.php';
    require_once "../conexao.php";

    try{
        if (isset($_REQUEST["acessar"])) {

            $email = $_REQUEST['email'];
            $senhas = $_REQUEST['senha'];

            $consultaAdministrador = $conn->prepare("SELECT * FROM  tbl_administrador WHERE email=:email;");

            $consultaAdministrador->bindValue(':email' , $email);
            $consultaAdministrador->execute();
            $rowAdministrador = $consultaAdministrador->fetch(PDO::FETCH_ASSOC);
            $totalRowAdministrador = $consultaAdministrador ->rowCount();


            $consultaAluno = $conn->prepare("SELECT * FROM  tbl_aluno WHERE email=:email;");

            $consultaAluno->bindValue(':email' , $email);
            $consultaAluno->execute();
            $rowAluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
            $totalRowAluno = $consultaAluno ->rowCount();

            if(0 == 0){       
                $bytes = random_bytes(7);
                $valorErro = bin2hex($bytes);

                header("Location: ../index.php?inativo=" . urlencode($valorErro));
            }
                
                if($totalRowAdministrador > 0 ){
                    if(password_verify($senhas, $rowAdministrador['senha'])){
                    if($rowAdministrador["situacao"] == '0'){       

                        $bytes = random_bytes(7);
                        $valorErro = bin2hex($bytes);
        
                        header("Location: ../index.php?inativo=" . urlencode($valorErro));
                        exit;
                    }elseif($rowAdministrador["situacao"] == '1'){

                    session_start();
                    $_SESSION['email'] = $rowAdministrador['email'];
                    
                    $_SESSION['senha'] = $rowAdministrador['senha'];
                    
                    $_SESSION['nome'] = $rowAdministrador['nome'];

                    header(("location:../administrador/controleDeAluno.php"));
                    }
                    } else{
                        $bytes = random_bytes(7);
                        $valorErro = bin2hex($bytes);
        
                        header("Location: ../index.php?erro=" . urlencode($valorErro));
                        exit;
                    }
                }else if($totalRowAluno > 0 ){
                    if((password_verify($senhas, $rowAluno['senha']))){
                        if($rowAluno["situacao"] == '0'){       

                            $bytes = random_bytes(7);
                            $valorErro = bin2hex($bytes);
            
                            header("Location: ../index.php?inativo=" . urlencode($valorErro));
                            exit;
                        }elseif($rowAluno["situacao"] == '1'){
                    // session_start();

                    // $_SESSION['email'] = $rowAluno['email'];
                    
                    // $_SESSION['senha'] = $rowAluno['senha'];
                    
                    // $_SESSION['nome'] = $rowAluno['nome'];

                          header(("location: ../usuario/home.php"));
                          exit;
                        }
                    }else{
                        $bytes = random_bytes(7);
                        $valorErro = bin2hex($bytes);
    
                        header("Location: ../index.php?erro=" . urlencode($valorErro));
                        exit;
                    }
                }else{
                    $bytes = random_bytes(7);
                    $valorErro = bin2hex($bytes);

                     header("Location: ../index.php?erro=" . urlencode($valorErro));
                    exit;
                }
        }

    }  catch (PDOException $erro) {
        echo $erro->getMessage();
      }
  ?>
    
</body>
</html>