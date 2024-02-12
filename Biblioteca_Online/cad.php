<?php
   $nome = $_POST['nomeC'];
   $nomeU = $_POST['nomeUsuario'];
   $email = $_POST['email'];
   $datan = $_POST['data'];
   $senha = $_POST['senhaO'];
   $csenha = $_POST['Csenha'];
   
 
         if($senha == $csenha)
         {
             $senhac = password_hash($senha,PASSWORD_DEFAULT);
             
             include 'verificarEmail.php';
             if (verificaEmail($email)) {
                 echo "<script> 
                         alert(' O endereço de e-mail é válido e tem registros DNS MX.');
                         </script>";
             
                 try{
                     include 'conexao.php';
                      $stmt = $servidor->prepare("INSERT INTO cadastro_usuario(nm_usuario,
                                                               nm_user,
                                                               nm_email,
                                                               dt_nascimento,
                                                               cd_senha_user) 
                                     VALUES(?,?,?,?,?);");
         
                             $stmt->bindParam(1,$nome);
                             $stmt->bindParam(2,$nomeU);
                             $stmt->bindParam(3,$email);
                             $stmt->bindParam(4,$datan);
                             $stmt->bindParam(5,$senhac);
                             $stmt->execute();
                     
                             echo "<script>
                                     alert('Cadastrado com Sucesso!');
                                 </script>";
                                 
                 } catch (PDOException $e) {
                         echo $e->getMessage();
                 }
                 $servidor= null;
                 header("location:login.php" );
             } else {
                 echo "<script> 
                 alert('O endereço de e-mail não é válido ou não possui registros DNS MX.');
                 </script>";
             }
         }else {
             echo "Senhas diferentes!!!!";
         }
    
?>

  

   