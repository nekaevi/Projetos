<?php
include 'menu.html';
$nmLivro = $_POST['nmLivro'];
$nmAutor = $_POST['nmAutor'];
$Dt = $_POST['Dt'];
$ordem = $_POST['ordernar'];
$genero = isset($_POST['genero']) ? $_POST['genero'] : array();


if ($ordem == "A-Z") {
    try {
        include 'conexao.php';

        $select = $servidor->prepare("SELECT nm_livro, genero, nm_autor, 
                                            dt_publicacao, nm_img, ds_livro 
                                             FROM livro WHERE nm_livro LIKE :nome 
                                             OR genero IN (:genero) 
                                             OR nm_autor LIKE :autor 
                                             OR dt_publicacao LIKE :dt
                                             ORDER BY nm_livro ASC");

        $select->bindValue(':nome', '%' . $nmLivro . '%');
        $select->bindValue(':autor', '%' . $nmAutor . '%');
        $genero_str = implode(',', $genero);
        $select->bindValue(':genero', $genero_str);
        $select->bindValue(':dt', '%' . $Dt . '%');

        $select->execute();
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if ($ordem == "Data") {
    try {
        include 'conexao.php';

        $select = $servidor->prepare("SELECT nm_livro, genero, nm_autor, 
                                             dt_publicacao, nm_img, ds_livro 
                                             FROM livro WHERE nm_livro LIKE :nome 
                                             OR genero IN (:genero) 
                                             OR nm_autor LIKE :autor 
                                             OR dt_publicacao LIKE :dt
                                             ORDER BY nm_livro ASC");

        $select->bindValue(':nome', '%' . $nmLivro . '%');
        $select->bindValue(':autor', '%' . $nmAutor . '%');
        $genero_str = implode(',', $genero);
        $select->bindValue(':genero', $genero_str);
        $select->bindValue(':dt', '%' . $Dt . '%');

        $select->execute();
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
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
    <form method="post" action="#">

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
    <!--
    <div class="div3" id="ler">

        <img src="img1.jpeg" class="img">

        <div class="conteudo">
            <h2>Os Sertões </h2>
            <p class="autor"> Euclides da Cunha</p>
            <p class="categorias">Romance Literatura </p>

            <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non gravida eros.
                <br>
                Donec justo nulla, rutrum vehicula luctus sed, ornare vitae odio.
                Vivamus volutpat
                <br>
                vel tortor ac tempus...
            </p>
        </div>

    </div>
   
    <div class="div4" id="ler">
        <img src="img2.webp"class="img">
        <div class="conteudo">
        <h2>Around the world in 80 days</h2>
        <p class="autor"> Jules Verne</p>
        <p class="categorias">Romance Natal</p>
        
        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non gravida eros.
        <br>
             Donec justo nulla, rutrum vehicula luctus sed, ornare vitae odio. 
            Vivamus volutpat 
        <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non gravida eros.
        <br>
            vel tortor ac tempus...</p>
        </div>
    </div>-->

</body>
<script>
    document.getElementById('ler').addEventListener('click', function() {
        window.location.href = 'ler.php';
    });
</script>

</html>