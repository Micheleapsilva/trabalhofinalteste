<?php
use PHPUnit\Framework\TestCase;
require_once 'Sistema.php';
require_once 'Adocoes.php';


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


