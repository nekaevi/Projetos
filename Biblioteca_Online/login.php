<?php
if(isset($_COOKIE['usuario'])){
  $usuario = $_COOKIE['usuario']; 
}
else{
  $usuario = ""; 
}
if(!empty($_POST['enviar'])) {
  $nome = $_POST['nome'];
  $senha =$_POST['senha'];
  $senhac = password_hash($senha,PASSWORD_DEFAULT);
  password_verify($senha,$senhac);
  $numA = rand(500000, 1000000);
  $numAleatorio = rand(500000, 1000000);

      try{
        include 'conexao.php';
        $select = $servidor->prepare("SELECT * FROM cadastro_usuario WHERE nm_user=:nome OR nm_email=:nome ");
        $select->bindParam(':nome', $nome);
        $select->execute();
        if($select->rowCount() == 1){
          session_start();
            $row = $select->fetch(PDO::FETCH_ASSOC);
            $senhac = $row['cd_senha_user'];             
              $_SESSION['cdlogin'] = $numA;
              $_SESSION['login'] = $numAleatorio;
              $_SESSION['user'] = $nome;
              // Verifique se o usuário é um administrador
              if ($row['is_admin'] == 1) {
                header("location:admin_c.php?sessaoAdmin=$numAleatorio" );

            } else {
                header("location:biblioteca.php?sessao=$numA" );
            }
               if(!empty($_POST['check'])) {
               setcookie('usuario', $nome, time() + 3600);
               }

                echo"<script>alert('Login certo!!');</script>";
            }   
            else{
                echo"<script>alert('Login errado!!');</script>";
            }
  }catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
  }
  $servidor = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<form method="post" action="#">
    <div class="container">
      
    <img src="gato-preto.png">
    <br>
    <br>
    <input type="text" class="text" placeholder="Usuário ou Email" name="nome" value="<?php echo $usuario; ?>">
    <br>
    <input type="password" class="text" placeholder="Senha" name="senha" value="">
    
        <div class="div2">
    <a href="#" class="check">Esqueceu a senha?</a>  <a id= "cadastrar" href="cadastro.php">Cadastre-se</a> 
    <br>
    <br>
    <input type="checkbox" id="lembrar" name="check"><label>Lembre-se de mim</label>
    </div>
    <br>
    
    <input type="submit" value="Log-in" name="enviar">
    </div>
</form>
</body>
</html>