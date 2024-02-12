<?php
include 'menu.html';
ini_set('default_charset', 'UTF-8'); // Para o charset das páginas
$time = 86400;
session_set_cookie_params($time);
session_start();
function gerarNomeUnico($extensao)
{
    return md5(uniqid(time())) . "." . $extensao;
}

function verificarTipoArquivo($tipo, $tiposPermitidos)
{
    return in_array($tipo, $tiposPermitidos);
}

if (isset($_SESSION['login'])) {
    $cd1 = $_GET['sessaoAdmin'];
    $cd2 = $_SESSION['login'];

    if ($cd1 != $cd2) {
    
        // O código da sessão não corresponde
        echo "<script>alert('Erro ao logar! Sua sessão é inválida.');</script>";
        exit;
    } else if (isset($_SESSION['ultimaAtv']) && time() - $_SESSION['ultimaAtv'] > $time) {
        // A sessão expirou, faça o que for necessário (por exemplo, encerrar a sessão)
        session_unset();
        session_destroy();
        header("location:login.php?msg=Sua sessão expirou. Faça login novamente.");
        exit;
    } else {
        // Atualize o horário da última atividade
        $_SESSION['ultimaAtv'] = time();
    }
}

if (isset($_POST['adicionar'])) {
    $isbn = $_POST['isbn'];
    $nlivro = $_POST['nlivro'];
    $genero = $_POST['genero'];
    $desc = $_POST['desc'];
    $autor = $_POST['autor'];
    $nedit = $_POST['nedit'];
    $clas = $_POST['class'];
    $dtp = $_POST['dtp'];
    $img = $_FILES['imagem'];
    $livro = $_FILES['livro'];



    if (!empty($img["name"]) && !empty($livro["name"])) {
        $error = array();

        $tiposImagemPermitidos = ["image/pjpeg", "image/jpeg", "image/png", "image/gif", "image/bmp", "image/webp"];
        $tiposPdfPermitidos = ["application/pdf"];

        // Verifique se os tipos de arquivo são permitidos
        if (!verificarTipoArquivo($img["type"], $tiposImagemPermitidos) && !verificarTipoArquivo($livro["type"], $tiposPdfPermitidos)) {
            $error[] = "O arquivo do livro não é um PDF válido. A imagem não tem um formato válido (permitidos: JPG, JPEG, PNG, GIF, BMP, WEBP).";
        }


        if (count($error) == 0) {
            $extensaoImg = pathinfo($img["name"], PATHINFO_EXTENSION);
            $extensaoLivro = pathinfo($livro["name"], PATHINFO_EXTENSION);

            //determinando o nome dos arquivos
            $nm_img = gerarNomeUnico($extensaoImg);
            $nm_liv = gerarNomeUnico($extensaoLivro);

            // Caminho de onde ficará a imagem
            $caminho_imagem = "Img/" . $nm_img;
            $caminho_pdf = "Livro/" . $nm_liv;

            // Faz o upload dos arquivos para seu respectivo caminho
            if (move_uploaded_file($img["tmp_name"], $caminho_imagem) && move_uploaded_file($livro["tmp_name"], $caminho_pdf)) {
                // Restante do seu código...
            } else {
                $error[] = "Erro ao mover os arquivos para seus respectivos caminhos.";
            }


            // Utilizando declaração preparada
            try {
                include 'conexao.php';

                $servidor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $servidor->prepare("INSERT INTO livro(isbn, nm_livro, genero, ds_livro,
                                                                 nm_autor, nm_editora, classificacao, 
                                                                 dt_publicacao, location_img, nm_img,
                                                                 location_pdf, nm_pdf)  
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bindParam(1, $isbn);
                $stmt->bindParam(2, $nlivro);
                $stmt->bindParam(3, $genero);
                $stmt->bindParam(4, $desc);
                $stmt->bindParam(5, $autor);
                $stmt->bindParam(6, $nedit);
                $stmt->bindParam(7, $clas);
                $stmt->bindParam(8, $dtp);
                $stmt->bindParam(9, $caminho_imagem);
                $stmt->bindParam(10, $nm_img);
                $stmt->bindParam(11, $caminho_pdf);
                $stmt->bindParam(12, $nm_liv);
                $stmt->execute();

                // Mensagem de sucesso
                echo "<script>alert('Adicionado com sucesso!');</script>";

            } catch (PDOException $e) {
                echo "Erro no banco de dados: " . $e->getMessage();
            }
        }
        $servidor = null;
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Administrador</title>
</head>
<body>
    <div class="titulo"> 
    <h1 class="h1">Adicione um livro</h1>
    </div>
    <div class="container">
    <form enctype="multipart/form-data" method="post" action="#">
        <label  class="light">ISBN</label>
        <br>
        <input type="number" class="form" name="isbn">

        <br>
        <br>

        <label class="light">Nome do livro</label>
        <br>
        <input type="text" class="form" name="nlivro">

        <br>
        <br>

        <label class="light">Categoria</label>
        <br>
        <select class="form" name="genero">
            <option value="Romance" class="option">Romance</option>
            <option value="Terror" class="option">Terror</option>
            <option value="Suspense" class="option">Suspense</option>
            <option value="Literatura" class="option">Literatura</option>
            <option value="Comédia" class="option">Comédia</option>
            <option value="Fantasia" class="option">Fantasia</option>
        </select>

        <br>
        <br>

        <label class="light">Sinopse</label>
        <br>
        <textarea rows="4" cols="50" class="textarea" name="desc"></textarea>

        <br>
        <br>

        <label class="light">Nome do(a) autor(a)</label>
        <br>
        <input type="text" class="form" name="autor">

        <br>
        <br>

        <label class="light">Nome da editora</label>
        <br>
        <input type="text" class="form" name="nedit">

        <br>
        <br>

        <label class="light">Classificação</label>
        <br>
        <select class="form" name="class">
            <option value="Livre" class="option">Livre</option>
            <option value="+10" class="option">+10</option>
            <option value="+12" class="option">+12</option>
            <option value="+14" class="option">+14</option>
            <option value="+16" class="option">+16</option>
            <option value="+18" class="option">+18</option>
        </select>


        <br>
        <br>

        <label class="light">Data de publicação</label>
        <br>
        <input type="date" class="form" name="dtp">

        <br>
        <br>

        
        <div>
            <label class="light">Carregue a capa do livro</label>
            <label for="arquivo" class="file">Enviar arquivo</label>
            <input type="file" id="arquivolivro"  name="imagem" accept="image/*">
        </div>

        <br>
        <br>

        <div>
            <label class="light" for="arquivo">Carregue o pdf do livro</label>
            <label for="arquivo" class="file">Enviar arquivo</label>
            <input type="file" id="arquivoimagem" name="livro" accept=".pdf">
        </div>

        <br><br>
        

        <input type="submit" value="Enviar" class="button" name="adicionar">

        <input type="reset" class="button">
        <br>
        
    </form>
    
</div>
</body>
</html>