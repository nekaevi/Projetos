<?php
include 'menu.html';
ini_set('default_charset','UTF-8'); // Para o charset das páginas

if (!empty($_POST['pesquisar'])) {
    $consulta = $_POST['consulta'];

    try {
        include 'conexao.php';
        $select = $servidor->prepare("SELECT nm_livro, nm_autor,
                                     genero, ds_livro, nm_img 
                                     FROM livro 
                                     WHERE nm_livro LIKE :nome");
        $select->bindValue(':nome', '%' . $consulta . '%');
        $select->execute();
    } catch (PDOException $e) {
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
    <title>Pesquisa</title>
    <link rel="stylesheet" href="pesquisa.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">

</head>

<body>
    <form method="post" action="">

        <div class="div1">
        
         <button class="button"><a href="editar.php">Editar</a></button>
        
            <input type="submit" class="enviar" placeholder="Enviar" name="pesquisar">
            <input type="text" class="text" placeholder="Pesquisar" name="consulta">
        </div>
    </form>

    

    <div class="div2" id="ler" style="display: block; clear: both;">
    <?php
    if (isset($select)) {
        while ($livro = $select->fetch()) {
            echo "<img class='img' src='Img/" . $livro['nm_img'] . "' alt='Foto de exibição' />";
            echo "<div class='conteudo'>";
            echo "<h2>" . $livro['nm_livro'] . "</h2>";
            echo "<p class='autor'>" . $livro['nm_autor'] . "</p>";
            echo "<p class='categorias'>" . $livro['genero'] . "</p>";
            echo "<p class='texto'>" . $livro['ds_livro'] . "</p>";
            echo "</div>";
            echo "<hr>"; // Adicionando uma linha horizontal entre os livros
        }
    }
    ?>
</div>


</body>
<script>
    document.getElementById('ler').addEventListener('click', function () {
        window.location.href = 'ler.php';
    });
</script>

</html>