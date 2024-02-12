<?php
include("conexao.php");
if (isset($_POST["ok"])) {

    $email = $mysqli->espape_string($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro[] = "E-mail Inválido";
    }

    $novasenha = substr(md5(time()), 0, 8);
    $nvSenhaC = md5(md5($novasenha));

    if($total == 0){
        $erro[] = "O Email informado não existe!!";
    }

    if(count($erro) == 0 && $total > 0) {


    if (mail($email, "Sua nova senha", "Sua nova senha: " . $novasenha)) {

        $sql = "UPDATE cadastro_usuario SET cd_senha_user ='$nvsenhaC' WHERE email = '$email'";
    }
}
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Seu e-mail">
        <input name="ok" value="ok" type="submit">
    </form>
</body>

</html>