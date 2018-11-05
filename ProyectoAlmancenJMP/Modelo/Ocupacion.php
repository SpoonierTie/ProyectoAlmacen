<?php
/**
 * Description of Ocupacion
 *
 * @author José Martínez Pradas
 */
class Ocupacion {
    //put your code here
    private $idEstanteria;
    private $numLeja;
    
    public function __construct($idEstanteria, $numLeja) {
        $this->idEstanteria = $idEstanteria;
        $this->numLeja = $numLeja;
    }
    
    public function getIdEstanteria() {
        return $this->idEstanteria;
    }

    public function getNumLeja() {
        return $this->numLeja;
    }

    public function setIdEstanteria($idEstanteria) {
        $this->idEstanteria = $idEstanteria;
    }

    public function setNumLeja($numLeja) {
        $this->numLeja = $numLeja;
    }



}
