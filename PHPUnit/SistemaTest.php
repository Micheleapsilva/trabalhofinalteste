<?php
use PHPUnit\Framework\TestCase;
require_once 'Sistema.php';
require_once 'Adocoes.php';
require_once 'Animal.php';
require_once 'usuario.php';


class SistemaTest extends TestCase
{
    public function testCadastroUsuario()
    {
        $usuario = new Usuario(1234567890, 'Michele', 'Rua tiradentes', 987654321);

        $sistema = new Sistema([], [], []);
        $sistema->cadastroUsuario($usuario);

        $this->assertEquals($usuario, $sistema->buscaUsuario(1234567890));
    }

    public function testRemoveUsuario()
    {
        $usuario = new Usuario(1234567890, 'Michele', 'Rua tiradentes', 987654321);

        $sistema = new Sistema([$usuario], [], []);
        $sistema->removeUsuario(1234567890);

        $this->assertNull($sistema->buscaUsuario(1234567890));
    }

    public function testCadastroAnimal()
    {
        $animal = new Animal('loki', 5, 'Macho', 'srd', 'Michele', 'foto.jpg');

        $sistema = new Sistema([], [], []);
        $sistema->cadastroAnimal($animal);

        $this->assertEquals($animal, $sistema->buscaAnimal(0));
    }

    public function testRemoveAnimal()
    {
        $animal = new Animal('loki', 2, 'Macho', 'srd', 'Michele', 'foto.jpg');

        $sistema = new Sistema([], [$animal], []);
        $sistema->removeAnimal(0);

        $this->assertNull($sistema->buscaAnimal(0));

      
    }

    public function testAdotarAnimal()
    {
        $animal = new Animal('loki', 2, 'Macho', 'SRD', 'Michele', 'foto.jpg');
        $usuario = new Usuario(1234567890, 'João', 'Rua A', 987654321);

        $sistema = new Sistema([], [], []);
        $sistema->cadastroUsuario($usuario);
        $sistema->cadastroAnimal($animal);

       $result = $sistema->adotarAnimal(0, 1234567890);

        $this->assertTrue($result);
     /*assertTrue verifica se a condição booleana é verdadeira.*/
        $this->assertTrue($animal->getAdotado());
        $this->assertEquals(0, $animal->getIdAnimal());
        $this->assertCount(1, $sistema->getAdocoes());
    }
}
