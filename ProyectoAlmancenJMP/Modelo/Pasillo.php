<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pasillo
 *
 * @author José Martínez Pradas
 */
class Pasillo {
    //put your code here
    private $id;
    private $pasillo;
    private $huecosDisponibles;
    private $huecosOcupados;
    
    public function __construct($id,$pasillo, $huecosDisponibles, $huecosOcupados) {
        $this->id = $id;
        $this->pasillo = $pasillo;
        $this->huecosDisponibles = $huecosDisponibles;
        $this->huecosOcupados = $huecosOcupados;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPasillo() {
        return $this->pasillo;
    }

    public function getHuecosDisponibles() {
        return $this->huecosDisponibles;
    }

    public function getHuecosOcupados() {
        return $this->huecosOcupados;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    public function setHuecosDisponibles($huecosDisponibles) {
        $this->huecosDisponibles = $huecosDisponibles;
    }

    public function setHuecosOcupados($huecosOcupados) {
        $this->huecosOcupados = $huecosOcupados;
    }



}
