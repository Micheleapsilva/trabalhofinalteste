<?php
require_once 'Sistema.php';
class Adocoes
{

    private $idAdocao;
    private $animal;
    private $usuario;


    public function __construct($animal, $usuario )
    {
        $this->idAdocao = null;
          $this->animal = $animal;
        $this->usuario =  $usuario;
    }

 
    public function setAnimal( $animal){
        $this->animal = $animal;
    }

    public function getAnimal(){
        return $this->animal;
    }

    public function setAdotante($usuario){
        $this->usuario = $usuario;
    }

    public function getAdotante(){
        return $this->usuario;
    }
    public function setIdAdocao($idAdocao){
        $this->idAdocao = $idAdocao;
    }

    public function getIdAdocao(){
        return $this->idAdocao;
    }

}
