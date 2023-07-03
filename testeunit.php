<?php
require_once 'Sistema.php';
require_once 'Adocoes.php';
require_once 'Animal.php';
require_once 'usuario.php';

class AdocoesTest extends TestCase
{
    public function testAnimal()
    {
        $animal = 'Cachorro';
        $usuario = 'Michele';

        $adocao = new Adocoes($animal, $usuario);
        $adocao->setAnimal('Gato');

        $this->assertEquals('Gato', $adocao->getAnimal());
    }

    public function testAdotante()
    {
        $animal = 'Cachorro';
        $usuario = 'Michele';

        $adocao = new Adocoes($animal, $usuario);
        $adocao->setAdotante('Maria');

        $this->assertEquals('Maria', $adocao->getAdotante());
    }

    public function testIdAdocao()
    {
        $animal = 'Cachorro';
        $usuario = 'Michele';

        $adocao = new Adocoes($animal, $usuario);
        $adocao->setIdAdocao(1);

        $this->assertEquals(1, $adocao->getIdAdocao());
    }
}


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
        $this->assertFalse($animal->iAdotado());

        /* assertFalse para verificar se o animal foi não foi adotado   / is é usado no boleano*/
    }
}

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
        $animal = new Animal('Loki', 2, 'Macho', 'SRD', 'Michele', 'foto.jpg');
        $usuario = new Usuario(1234567890, 'João', 'Rua A', 987654321);

        $sistema = new Sistema([], [$animal], []);
        $result = $sistema->adotarAnimal(0, 1234567890);

        $this->assertTrue($result);
     /*assertTrue verifica se a condição booleana é verdadeira.*/
        $this->assertTrue($animal->isAdotado());
        $this->assertEquals(0, $animal->getIdAnimal());
        $this->assertCount(1, $sistema->getAdocoes());
    }
}