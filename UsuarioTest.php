<?php
use PHPUnit\Framework\TestCase;
require_once 'Sistema.php';
require_once 'usuario.php';

class UsuarioTest extends TestCase
{
    public function testConstructUsuario()
    {
        $cpf = 1234567890;
        $nome = 'Michele';
        $endereco = 'Rua tiradentes';
        $telefone = 987654321;

        $usuario = new Usuario($cpf, $nome, $endereco, $telefone);

        $this->assertEquals($cpf, $usuario->getCpf());
        $this->assertEquals($nome, $usuario->getNome());
        $this->assertEquals($endereco, $usuario->getEndereco());
        $this->assertEquals($telefone, $usuario->getTelefone());
    }
}
