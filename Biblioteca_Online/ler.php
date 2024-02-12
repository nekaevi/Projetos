<?php
include 'menu.html';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ler</title>
    <link rel="stylesheet" href="ler.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="div">
        <img src="img2.webp" alt="Imagem 1" class="img">
    </div>

    <div class="div2">
        <h2>Around the world in 80 days</h2>
        <p class="autor"> Jules Verne</p>
        <p class="categorias">Romance Natal</p>
        <br>
        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Nam eget erat dolor.
             Suspendisse pulvinar porttitor erat, ac eleifend 
             dolor iaculis et. Fusce ullamcorper 
             enim non nunc fringilla malesuada. 
             Proin justo tortor, luctus nec sapien at,
              vehicula pulvinar enim. 
             Aenean vitae sem ante. Duis pretium nunc quis ipsum tempor
              mollis.
             Maecenas interdum facilisis mauris a consectetur. Vestibulum vulputate 
             quis tellus vel mollis.
        
        <br>
        <br>
        <br>
        <br>
        <button class="botao">Ler agora</button>
        <button class="baixar"><img class="imgLoad" src="download.png"></button>
        <button class="baixar" id="adicionarNaBiblioteca"><img class="imgLoad" src="mais.png"></button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      const adicionarNaBibliotecaBtn = document.getElementById("adicionarNaBiblioteca");

      adicionarNaBibliotecaBtn.addEventListener("click", function() {
        const nomeLivro = document.querySelector(".div2 h2").textContent;
        const imagemLivro = document.querySelector(".div img").src;
        const livros = JSON.parse(localStorage.getItem("livros")) || [];

        if (!livros.some(livro => livro.nome === nomeLivro)) {
          livros.push({ nome: nomeLivro, imagem: imagemLivro });
          localStorage.setItem("livros", JSON.stringify(livros));
          alert("Livro adicionado à biblioteca!");
        } else {
          alert("O livro já está na biblioteca!");
        }
      });
    });
</script>
</body>
</html>