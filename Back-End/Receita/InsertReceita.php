<?php
session_start();
include_once 'conexao.php';
ob_start();

function insertReceita($conn, $dados){
    $queryInsert = "INSERT INTO receita
        (nome,
        cozinheiro,
        dt_criacao,
        idCateg,
        modo_preparo,
        qt_porcao,
        ind_inedita,
        Imagen_idImagen,
        ListaDeSabores) 
        VALUES 
        (:nome, 
        :cozinheiro,
        :dt_criacao,
        :idCateg,
        :modo_preparo,
        :qt_porcao,
        :ind_inedita,
        :Imagen_idImagen,
        :ListaDeSabores)";
    $cadaReceita = $conn-> prepare($queryInsert);
    $cadaReceita->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cadaReceita->bindParam(':cozinheiro', $_SESSION['idLogin'], PDO::PARAM_INT);
    $cadaReceita->bindParam(':dt_criacao', $dados['dataI'], PDO::PARAM_STR);
    $cadaReceita->bindParam(':idCateg', $dados['Categoria'], PDO::PARAM_INT);
    $cadaReceita->bindParam(':modo_preparo', $dados['MP'], PDO::PARAM_STR);
    $cadaReceita->bindParam(':qt_porcao', $dados['porcao'], PDO::PARAM_INT);
    $cadaReceita->bindParam(':ind_inedita', $dados['inedita'], PDO::PARAM_INT);
    $cadaReceita->bindParam(':Imagen_idImagen', $dados['img'], PDO::PARAM_STR);
    $cadaReceita->bindParam(':ListaDeSabores', $dados['Sabores'], PDO::PARAM_INT);
    $cadaReceita-> execute();
}




?>