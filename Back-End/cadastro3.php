<?php

function insertFunc($dados, $idLogin, $conn){

    //var_dump($rowUse)
    $queryInsertFuncionario = "INSERT INTO funcionario
    (
    rg,
    nome,
    dt_ingr,
    salario,
    idCargo,
    nome_fantasia,
    login_idLogin)
    VALUES
    (:RG,
    :Nome,
    :dataI,
    :Salario,
    :Cargo,
    :NomeFantasia,
    ".$idLogin.");";

    $cadaFunc = $conn -> prepare($queryInsertFuncionario);
    $cadaFunc -> bindParam(':RG', $dados['RG'], PDO::PARAM_STR);
    $cadaFunc -> bindParam(':Nome', $dados['Nome'], PDO::PARAM_STR);
    $cadaFunc -> bindParam(':dataI', $dados['dataI'], PDO::PARAM_STR);
    $cadaFunc -> bindParam(':Salario', $dados['Salario'], PDO::PARAM_STR);
    $cadaFunc -> bindParam(':Cargo', $dados['Cargo'], PDO::PARAM_INT);
    $cadaFunc -> bindParam(':NomeFantasia', $dados['NomeFantasia'], PDO::PARAM_STR);
    $cadaFunc-> execute();
}
?>