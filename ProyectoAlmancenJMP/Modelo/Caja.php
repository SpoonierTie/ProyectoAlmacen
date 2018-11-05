<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
 *
 * @author José Martínez Pradas
 */
class Caja {
    //put your code here
    private $id;
    private $codigo;
    private $contenido;
    private $alto;
    private $ancho;
    private $profundidad;
    private $material;
    private $color;
    
    public function __construct($codigo, $contenido, $alto, $ancho, $profundidad, $material, $color) {
        $this->codigo = $codigo;
        $this->contenido = $contenido;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->profundidad = $profundidad;
        $this->material = $material;
        $this->color = $color;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getAlto() {
        return $this->alto;
    }

    public function getAncho() {
        return $this->ancho;
    }

    public function getProfundidad() {
        return $this->profundidad;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getColor() {
        return $this->color;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setAlto($alto) {
        $this->alto = $alto;
    }

    public function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    public function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    public function setMaterial($material) {
        $this->material = $material;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function __toString() {
        
    }


}
