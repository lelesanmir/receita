<?php

require_once 'conexao.php';

class Referencia
{
    private $cozinheiro;
    private $idRestaurante;
    private $dt_inicio;
    private $dt_fim;

    public function __construct($cozinheiro, $idRestaurante, $dt_inicio, $dt_fim)
    {
        $this->cozinheiro = $cozinheiro;
        $this->idRestaurante = $idRestaurante;
        $this->dt_inicio = $dt_inicio;
        $this->dt_fim = $dt_fim;
    }

    // Setters
    public function setCozinheiro($cozinheiro)
    {
        $this->cozinheiro = $cozinheiro;
    }

    public function setIdRestaurante($idRestaurante)
    {
        $this->idRestaurante = $idRestaurante;
    }

    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
    }

    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
    }

    // Getters
    public function getCozinheiro()
    {
        return $this->cozinheiro;
    }

    public function getIdRestaurante()
    {
        return $this->idRestaurante;
    }

    public function getDtInicio()
    {
        return $this->dt_inicio;
    }

    public function getDtFim()
    {
        return $this->dt_fim;
    }
}

?>

