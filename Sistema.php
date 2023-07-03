<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ADOTEPET', 'AdotePet');
define('PATH', ROOT . '/' . ADOTEPET . '/');

require_once 'Animal.php';
require_once 'Adocoes.php';
require_once 'usuario.php';



class Sistema
{

    private $usuarios = [];
    private $animais = [];
    private $adocoes = [];
   


    public function __construct($usuarios, $animais, $adocoes)
    {

        if (file_exists(PATH . 'sistema.save')) {
            $dados = file_get_contents(PATH . 'sistema.save');
            $sistema = unserialize($dados);
            $this->usuarios = $sistema->usuarios;
            $this->animais = $sistema->animais;
            $this->adocoes = $sistema->adocoes;
            
        }
    }

    function __destruct()
    {
        $serializado = serialize($this);
        file_put_contents(PATH . 'sistema.save', $serializado);
    }

    public function cadastroUsuario($usuario)
    {

        $aux = $this->buscaUsuario($usuario->getCpf());
        if ($aux == null) {
            $this->usuarios[] = $usuario;
        }
    }

    public function buscaUsuario($cpf)
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getCpf() == $cpf) {
                return $usuario;
            }
        }
        return null;
    }

    public function removeUsuario($cpf)
    {
        $indRemover = null;
        foreach ($this->usuarios as $ind => $usuario) {
            if ($usuario->getCpf() == $cpf) {
                $indRemover = $ind;
            }
        }
        var_dump($indRemover);
        if ($indRemover !== null) {
            unset($this->usuarios[$indRemover]);
        }
    }


    public function cadastroAnimal($animal)
    {
       /* Código invalidado após revisão - $aux = $this->buscaAnimal($animal->idAnimal());
        if ($aux == null) {*/
            $this->animais[] = $animal;
            end($this->animais);
            $idAnimal = key($this->animais);
            $animal->setIdAnimal($idAnimal);
        
    }

    public function buscaAnimal($indiceAnimal)
    {
        if (isset($this->animais[$indiceAnimal])){
            return $this->animais[$indiceAnimal];
        } 

        return null;
    }

    public function removeAnimal($indiceAnimal)
    {
        if (isset($this->animais[$indiceAnimal])){
            unset($this->animais[$indiceAnimal]);
        } 
    }

    public function adotarAnimal($idAnimal, $cpf)
    {
        $animal = $this->buscaAnimal($idAnimal);
        $usuario = $this->buscaUsuario($cpf);

        if ($animal == null && $usuario == null) {
            return "O animal com o ID $idAnimal ou o Usuário com o CPF $cpf não foi encontrado.";
        } else {
            if ($animal->getAdotado() == true) {
                echo "O animal com o ID $idAnimal não está disponível para reserva.";
            } else {
                $animal->setAdotado(true);
                
                $adt = new Adocoes($animal,$usuario);
                $this->adocoes[] = $adt;
                end($this->adocoes);
                $idAdocao = key($this->adocoes);
                $adt->setIdAdocao($idAdocao);
                return true;
            }
        }
    }

    public function getAnimais()
    {
        return $this->animais;
    }


    public function getUsuarios()
    {
        return $this->usuarios;
    }


    public function setAnimais($animais)
    {
        $this->animais = $animais;
    }


    public function getAdocoes()
    {
        return $this->adocoes;
    }
}
