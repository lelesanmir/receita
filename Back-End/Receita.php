<?php

require_once 'conexao.php';

class Receita
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Função para criar uma receita
    public function criarReceita($nome, $cozinheiro, $idReceita, $dt_criacao, $idCateg, $modo_preparo, $qt_porcao, $degustador, $dt_degustacao, $nota_degustacao, $ind_inedita, $Imagen_idImagen, $ListaDeSabores)
    {
        $query = "INSERT INTO receita 
        (nome, cozinheiro, idReceita, dt_criacao, idCateg, modo_preparo, qt_porcao, degustador, dt_degustacao, nota_degustacao, ind_inedita, Imagen_idImagen, ListaDeSabores) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cozinheiro);
        $stmt->bindParam(3, $idReceita);
        $stmt->bindParam(4, $dt_criacao);
        $stmt->bindParam(5, $idCateg);
        $stmt->bindParam(6, $modo_preparo);
        $stmt->bindParam(7, $qt_porcao);
        $stmt->bindParam(8, $degustador);
        $stmt->bindParam(9, $dt_degustacao);
        $stmt->bindParam(10, $nota_degustacao);
        $stmt->bindParam(11, $ind_inedita);
        $stmt->bindParam(12, $Imagen_idImagen);
        $stmt->bindParam(13, $ListaDeSabores);

        if ($stmt->execute()) {
            return true;
        }

        printf("Erro: %s.\n", $stmt->errorInfo());

        return false;
    }

    // Adicione mais funções conforme necessário, como atualização, exclusão, busca etc.
}

$receita = new Receita($pdo);

?>
