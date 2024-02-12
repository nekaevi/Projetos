let imagemAtual = 0;
const imagens = document.querySelectorAll('.imagens img');

function mudarImagem(direcao) {
  imagemAtual += direcao;

  if (imagemAtual < 0) {
    imagemAtual = imagens.length - 1;
  } else if (imagemAtual >= imagens.length) {
    imagemAtual = 0;
  }

  const deslocamento = -imagemAtual * 320; // sAjuste conforme a largura das imagens
  document.querySelector('.imagens').style.transform = `translateX(${deslocamento}px)`;
}

mudarImagem(0); // Inicializa a primeira imagem

