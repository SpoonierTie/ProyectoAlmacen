<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estanteria
 *
 * @author José Martínez Pradas
 */
class Estanteria {

    //put your code here
    private $id;
    private $codigo;
    private $numLejas;
    private $idPasillo;
    private $numero;
    private $numLejasOcupadas;

    public function __construct($codigo, $numLejas, $idPasillo, $numero, $numLejasOcupadas) {
        $this->codigo = $codigo;
        $this->numLejas = $numLejas;
        $this->idPasillo = $idPasillo;
        $this->numero = $numero;
        $this->numLejasOcupadas = $numLejasOcupadas;
    }

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNumLejas() {
        return $this->numLejas;
    }

    public function getPasillo() {
        return $this->idPasillo;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getNumLejasOcupadas() {
        return $this->numLejasOcupadas;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNumLejas($numLejas) {
        $this->numLejas = $numLejas;
    }

    public function setPasillo($pasillo) {
        $this->idPasillo = $pasillo;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setNumLejasOcupadas($numLejasOcupadas) {
        $this->numLejasOcupadas = $numLejasOcupadas;
    }

    public function __toString() {
        
    }

}
