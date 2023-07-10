<?php

class Usuario
{

    private int $cpf;
    private string $nome;
    private string $endereco;
    private int $telefone;
    
    public function __construct( $cpf,  $nome,  $endereco,  $telefone)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->nome = $telefone;
    }

       
    public function getNome() 
    {
        return $this->nome;
    }

    
    public function getEndereco()
    {
        return $this->endereco;
    }

    
    public function getCpf(): int
    {
        return $this->cpf;
    }

    
    public function getTelefone(): int
    {
        return $this->telefone;
    }

    
   
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

}