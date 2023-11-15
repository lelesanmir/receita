<?php
session_start();
include_once 'conexao.php';
ob_start();

function tratarImg($nome, $conn){
    $pasta = "imagens/";
    $Nome = $nome['name'];
    $extensao = strtolower(pathinfo($Nome, PATHINFO_EXTENSION));
    $novoNome = uniqid();
    $path = $pasta.$novoNome.".".$extensao;

    if($extensao != "jpg" && $extensao != "png"){
        $_SESSION["img"] = "Erro: é necessário utilizar uma imagem JPG ou PNG!";
        die();
        header("Location: receita.php");
    }

    $salvaImg = move_uploaded_file($nome['tmp_name'], $path);

    if($salvaImg = false){
        $_SESSION["img"] = "Erro: imagem não foi salva com sucesso!";
        die();
        header("Location: receita.php");
    }

    //insert

    $queryInsert = "INSERT INTO imagen (imagenUrl) VALUES (:imagenUrl);";
    $cadaImg = $conn-> prepare($queryInsert);
    $cadaImg->bindParam(':usuario', $path, PDO::PARAM_STR);
    $cadaImg-> execute();
}

?>