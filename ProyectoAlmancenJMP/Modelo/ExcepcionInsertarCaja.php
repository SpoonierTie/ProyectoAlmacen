<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcepcionInsertarCaja
 *
 * @author José Martínez Pradas
 */
class ExcepcionInsertarCaja extends Exception{
    //put your code here
    
    private $tipoError;
    
   public function __construct($message,$code,$_value) {
        parent::__construct($message, $code, null);
        $this->tipoError;
    }
    
    public function getTipoError() {
        return $this->tipoError;
    }

    public function setTipoError($tipoError) {
        $this->tipoError = $tipoError;
    }

        
    public function __toString(): string {
        return __CLASS__ . ": [{$this->code}]: [{$this->message}]: {$this->tipoError}\n";
    }


}
