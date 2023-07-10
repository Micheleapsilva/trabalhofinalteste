
<?php
use PHPUnit\Framework\TestCase;
require_once 'Sistema.php';
require_once 'Animal.php';


class AnimalTest extends TestCase
{
    public function testConstructAnimal()
    {
        $nome = 'Loki';
        $idade = 2;
        $genero = 'Macho';
        $raca = 'SRD';
        $usuario = 'Michele';
        $foto = 'foto.jpg';

        $animal = new Animal($nome, $idade, $genero, $raca, $usuario, $foto);

        $this->assertNull($animal->getIdAnimal());
          /*assertNull para ver se esta recebendo valor nulo*/
        $this->assertEquals($nome, $animal->getNome());
        $this->assertEquals($idade, $animal->getIdade());
        $this->assertEquals($genero, $animal->getGenero());
        $this->assertEquals($raca, $animal->getRaca());
        $this->assertEquals($usuario, $animal->getUsuario());
        $this->assertEquals($foto, $animal->getFoto());
        $this->assertFalse($animal->getAdotado());

        /* assertFalse para verificar se o animal foi não foi adotado   / is é usado no boleano*/
    }
}