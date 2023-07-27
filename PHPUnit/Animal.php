<?php
require_once 'Sistema.php';
class Animal
{


    private $idAnimal;
    private $nome;
    private $idade;
    private $genero;
    private $tipo;
    private $raca;
    private $usuario;
    private $adotado;
    private $foto;


    public function __construct($nome,  $idade,  $genero, $tipo, $raca,  $usuario, $foto)
    {
        $this->idAnimal = null;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->genero = $genero;
        $this->tipo = $tipo;
        $this->raca = $raca;
        $this->usuario = $usuario;
        $this->foto = $foto;
        $this->adotado = false;
    }



    public function setAdotado( $adotar)
    {
        $this->adotado = $adotar;
    }
    public function getAdotado()
    {
        return $this->adotado;
    }

    public function getIdAnimal(){
        return $this->idAnimal;
    }


    public function getNome(){
        return $this->nome;
    }


    public function getIdade(){
        return $this->idade;
    }


    public function getGenero(){
        return $this->genero;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getRaca(){
        return $this->raca;
    }

    public function setIdAnimal($idAnimal){
        $this->idAnimal = $idAnimal;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setIdade( $idade){
        $this->idade = $idade;
    }

  
    public function setGenero( $genero){
        $this->genero = $genero;
    }

    public function setTipo( $tipo){
        $this->tipo = $tipo;
    }

  
    public function setRaca( $raca){
        $this->raca = $raca;
    }

 
    public function setFoto( $foto){
        $this->foto = $foto;
    }

    public function getFoto()
    {
        return $this->foto;
    }


    public function setUsuario( $usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

}
