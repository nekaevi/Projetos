<?php
include 'menu.html';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="biblioteca.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Biblioteca</title>
</head>
<body>

  <div class="text">
    <h1>Minha Biblioteca</h1>
    <div class="dropdown">
      <button class="delete">
        <img src="opcao.png" alt="Excluir">
      </button>
      <div class="dropdown-content">
        <a href="#" id="excluirLivros">Excluir Livros</a>
      </div>
    </div>
  </div>

  <div class="biblioteca">
        <ul id="listaLivros">
          <!-- A lista de livros será exibida aqui -->
        
        </ul>
        <button id="confirmarExclusao" style="display: none;">Confirmar Exclusão</button>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const listaLivros = document.getElementById("listaLivros");
      const confirmarExclusaoBtn = document.getElementById("confirmarExclusao");

      const livros = JSON.parse(localStorage.getItem("livros")) || [];

      // Adiciona os livros existentes ao carregar a página
      livros.forEach(function(livro) {
        const li = document.createElement("li");

        // Adiciona a imagem
        const img = document.createElement("img");
        img.src = livro.imagem;
        img.alt = livro.nome;
        li.appendChild(img);

        // Adiciona o nome do livro
        const nomeLivro = document.createElement("p");
        nomeLivro.textContent = livro.nome;
        li.appendChild(nomeLivro);

        // Adiciona uma caixa de seleção para cada livro
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = livro.nome;
        li.appendChild(checkbox);

        listaLivros.appendChild(li);
      });

      // Adiciona um evento de clique ao botão "Excluir Livros"
      document.getElementById("excluirLivros").addEventListener("click", function() {
        // Exibe os checkboxes e o botão de confirmação
        confirmarExclusaoBtn.style.display = "block";
        listaLivros.querySelectorAll("input[type=checkbox]").forEach(function(checkbox) {
          checkbox.style.display = "inline";
        });
      });

      // Adiciona um evento de clique ao botão "Confirmar Exclusão"
      confirmarExclusaoBtn.addEventListener("click", function() {
        const checkboxes = listaLivros.querySelectorAll("input[type=checkbox]:checked");

        if (checkboxes.length > 0) {
          // Obtém os nomes dos livros selecionados
          const livrosSelecionados = Array.from(checkboxes).map(checkbox => checkbox.value);

          // Obtém a lista de livros do armazenamento local
          const livrosNoLocalStorage = JSON.parse(localStorage.getItem("livros")) || [];

          // Filtra os livros que NÃO estão na lista de livros selecionados
          const livrosRestantes = livrosNoLocalStorage.filter(livro => !livrosSelecionados.includes(livro.nome));

          // Atualiza o armazenamento local com os livros restantes
          localStorage.setItem("livros", JSON.stringify(livrosRestantes));

          // Remove os elementos da lista na página
          checkboxes.forEach(checkbox => {
            const li = checkbox.closest("li");
            listaLivros.removeChild(li);
          });

          // Exibe uma mensagem indicando que os livros foram excluídos
          alert("Livros excluídos com sucesso!");

          // Reinicia o estado, oculta os checkboxes e o botão de confirmação
          confirmarExclusaoBtn.style.display = "none";
          listaLivros.querySelectorAll("input[type=checkbox]").forEach(function(checkbox) {
            checkbox.style.display = "none";
          });
        } else {
          alert("Nenhum livro selecionado para exclusão.");
        }
      });
    });
  </script>
</body>
</html>