<?php
include 'menu.html';
ini_set('default_charset','UTF-8'); // Para o charset das páginas

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar</title>
    <link rel="stylesheet" href="editar.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
        <form action="pesquisa_editar.php" method="post">
            <label>Titulo</label>
            <input type="text" class="text" name="nmLivro">
            <hr>
            <br>
            <br>

            <label>Autor</label>
            <input type="text" name="nmAutor">
            <hr>
            <br>
            <br>

            <label>Data de publicação</label>
            <input type="date" name="Dt">
            <hr>
            <br>

            <label>Genêro</label>
            <hr>
            <div class="checkbox-grid">
                <label><input type="checkbox" name="genero" value="Romance">Romance</label>
                <label><input type="checkbox" class="check" name="genero" value="Terror">Terror</label>
                <label><input type="checkbox" class="box" name="genero" value="Drama">Drama</label>
                <label><input type="checkbox" name="genero" value="Suspense">Suspense</label>
                <label><input type="checkbox" class="check" name="genero" value="Literatura">Literatura Clássica</label>
                <label><input type="checkbox" class="box" name="genero" value="Comédia">Comédia</label>
                <label><input type="checkbox" name="genero" value="Fantasia">Fantasia</label>
                <label><input type="checkbox" class="check" name="genero" value="Romance">Romance</label>
                <label><input type="checkbox" class="box" name="genero" value="Terror">Terror</label>
            </div>
            <br>
            <br>

            <label>Ordernar por</label>
            <hr>
            <select class="select" name="ordernar">
                <option value="A-Z">Ordem alfabetica(A a Z)</option>
                <option value="Data">Data de lançamento</option>
            </select>

            <br>
            <br>

            <input type="submit" value="Concluir" name="pesquisar">
        </form>
    </div>

    </form>
    </div>
</body>
</html>