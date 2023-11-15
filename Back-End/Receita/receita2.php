<?php
session_start();
include_once 'conexao.php';
ob_start();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$img = $_FILES["img"];
var_dump($dados);
var_dump($img);

//tratar a imagem
if($img["error"]){
    $_SESSION['img'] = "Erro: imagem não enviada com sucesso!";
    die();
}


//insert
if(!empty($dados['sendLogin'])){
    tratarImg($img, $conn);
    insertReceita($conn, $dados);

    $cadaReceita = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT idLogin FROM login WHERE login = :usuario');
    $cadaLogin->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
    $stmt->execute(array(':usuario' => $dados['usuario']));
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $idLogin = $resultado['idLogin'];
    echo $idLogin;
    
    insertFunc($dados, $idLogin, $conn);
}

?>