<?php
session_start();
include_once 'conexao.php';
include_once 'cadastro3.php';
ob_start();

global $dados;
global $idLogin;

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);




if(!empty($dados['sendLogin'])){
    $queryInsertLogin = "INSERT INTO login (senha, login) VALUES (:senha, :usuario)";
    $cadaLogin = $conn-> prepare($queryInsertLogin);
    $cadaLogin->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
    $cadaLogin->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
    $cadaLogin-> execute();

    $retornaLogin = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT idLogin FROM login WHERE login = :usuario');
    $cadaLogin->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
    $stmt->execute(array(':usuario' => $dados['usuario']));
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $idLogin = $resultado['idLogin'];
    echo $idLogin;
    
    insertFunc($dados, $idLogin, $conn);

}
?>