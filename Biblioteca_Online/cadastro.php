
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">

</head>
<body>
    <div class="div">
        <form method="post" action="cad.php">
            <br>
            <img src="gato-preto.png">
            <br>
            
            <h2>Cadastre-se</h2>
            <label>Nome completo</label>
            <br>
            <input type="text" placeholder="" name="nomeC">

            
            <label>Usuário</label>
            <br>
            <input type="text" placeholder="" name="nomeUsuario">

            
            <label>E-mail</label>
            <br>
            <input type="email" placeholder="" name="email">

            
            <label>Data de nascimento</label>
            <br>
            <input type="date" placeholder="" name="data">

            
            <label>Senha</label>
            <br>
            <input type="password" placeholder="" name="senhaO">

        
            <label>Confirmar senha</label>
            <br>
            <input type="password" placeholder="" name="Csenha">

            <br>
            <input type="submit" name="cadastro" value="Cadastrar" >

        </form>
    </div>
</body>
</html>