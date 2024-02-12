<?php
include 'menu.html';
ini_set('default_charset','UTF-8'); // Para o charset das páginas

try {
  include 'conexao.php';
  $select = $servidor->prepare("SELECT * FROM livro ");
  $select->execute();
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$servidor = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="Pprincipal.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<form action="pesquisa.php" method="POST">
    <div>
    <input type="submit" class="enviar" name="pesquisar" placeholder="Enviar">
    <input type="text" class="text" name="consulta" placeholder="Pesquisar">
    </div>
</form> 
    <br>
    <br>
    <p>Mais populares</p>

    <div class="div2">
  <div class="seta esquerda seta-custom" onclick="mudarImagem(-1)">&#9665;</div>
  <div class="imagens">
  <?php while ($livros = $select->fetch()) { ?>
                <?php if (isset($livros['nm_img'])) { ?>
                    <img alt="Imagem 1" class="img1" src='Img/<?php echo $livros['nm_img']; ?>' alt='Foto de exibição' /><br />
                <?php } else { ?>
                    <p>Imagem não disponível</p>
                <?php } ?>
            <?php } ?>
    <img src="img1.jpeg" alt="Imagem 1" class="img1">
    <img src="img2.webp" alt="Imagem 2">
    <img src="img3.jpg" alt="Imagem 3">
    <img src="img1.jpeg" alt="Imagem 5">
    <img src="img2.webp" alt="Imagem 6">
    <img src="img3.jpg" alt="Imagem 7">
    <img src="img1.jpeg" alt="Imagem 8">
    <img src="img2.webp" alt="Imagem 9">
    
    <!-- Adicione mais imagens, se necessário -->
  </div>
  <div class="seta direita seta-custom" onclick="mudarImagem(1)">&#9655;</div>
  </div>

<script src="Pprincipal.js"></script>
</body>
</html>