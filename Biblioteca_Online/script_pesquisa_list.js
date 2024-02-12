// Exemplo de dados (pode ser substituído pela lógica de busca no banco de dados)
const dadosDoBanco = [
    { id: 1, nome: 'Usuário 1', email: 'usuario1@email.com' },
    { id: 2, nome: 'Usuário 2', email: 'usuario2@email.com' },
    { id: 3, nome: 'Usuário 3', email: 'usuario3@email.com' },
];

// Função para gerar a lista de usuários em divs
function gerarListaUsuarios() {
    const listaUsuariosDiv = document.getElementById('lista-usuarios');

    // Limpa o conteúdo atual da div
    listaUsuariosDiv.innerHTML = '';

    // Itera sobre os dados e cria divs para cada usuário
    dadosDoBanco.forEach(usuario => {
        const usuarioDiv = document.createElement('div');
        usuarioDiv.innerHTML = `
            <h2>${usuario.nome}</h2>
            <p>ID: ${usuario.id}</p>
            <p>Email: ${usuario.email}</p>
            <hr>
        `;
        listaUsuariosDiv.appendChild(usuarioDiv);
    });
}

// Chama a função para gerar a lista quando a página carrega
window.onload = gerarListaUsuarios;
