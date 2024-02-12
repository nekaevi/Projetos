<?php
$servername = "localhost";
$username = "root";
$pass = "";
//$pass = "usbw";
try {
    $servidor = new PDO("mysql:host=$servername", $username, $pass);
    $servidor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $base = 'Livros';
    $stmt = $servidor->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbname");
    $stmt->bindParam(':dbname', $base);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
       //echo "O banco de dados já existe.\n";

        $servidor = new PDO("mysql:host=$servername;dbname=$base", $username, $pass);
        $servidor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } else{
        $stmt = $servidor->prepare("CREATE DATABASE " . $base);
        $stmt->execute();
       //echo "Banco de dados criado com sucesso.\n";
    

    $servidor = new PDO("mysql:host=$servername;dbname=$base", $username, $pass);
    $servidor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE LIVRO(
        cd_livro INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
        isbn INT NOT NULL,
        nm_livro VARCHAR(150) NOT NULL,
        genero VARCHAR(100) NOT NULL,
        ds_livro VARCHAR(300) NOT NULl,
        nm_autor VARCHAR(100) NOT NULL,
        nm_editora VARCHAR(100) NOT NULL,
        classificacao VARCHAR(8) NOT NULL,
        dt_publicacao DATE NOT NULL,
        location_img VARCHAR(255) NOT NULL,
        nm_img VARCHAR(255),
        location_pdf VARCHAR(255) NOT NULL,
        nm_pdf VARCHAR(255)
        );";
    $sql1 ="CREATE TABLE CADASTRO_USUARIO(
        cd_usuario INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nm_usuario VARCHAR(50) NOT NULL,
        nm_user VARCHAR(50) NOT NULL,
        nm_email VARCHAR(100) NOT NULL, 
        dt_nascimento DATE NOT NULL,
        cd_senha_user VARCHAR(20) NOT NULL,
        is_admin BOOLEAN DEFAULT 0
        );";
    $sql2 =" CREATE TABLE biblioteca(
        id_biblioteca INTEGER AUTO_INCREMENT PRIMARY KEY,
        cd_usuario INT,
        cd_livro INT,
        FOREIGN KEY (cd_usuario) REFERENCES cadastro_usuario(cd_usuario),
        FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
    );";
    $servidor->exec($sql);
    $servidor->exec($sql1);
    $servidor->exec($sql2);
   //echo "Tabelas criadas com sucesso\n";
}
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>