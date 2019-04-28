<?php

namespace CDC\Loja\Prodduto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\MaiorEMenor;
use CDC\Loja\Produto\Produto;
use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Class MairoEMenorTest
 *
 * @package CDC\Loja\Prodduto
 */
class MairoEMenorTest extends PHPUnit
{
    /**
     * Ordem decrescente
     */
    public function testOrdemDecrescente()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));
        $carrinho->adiciona(new Produto("Liquidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de pratos", 70.00));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);

        $this->assertInstanceOf(Produto::class, $maiorEMenor->getMenor());
        $this->assertInternalType("object", $maiorEMenor->getMenor());
        $this->assertEquals("Jogo de pratos", $maiorEMenor->getMenor()->getNome());

        $this->assertInstanceOf(Produto::class, $maiorEMenor->getMaior());
        $this->assertInternalType("object", $maiorEMenor->getMaior());
        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->getNome());
    }

    /**
     * Apenas um produto
     */
    public function testApenasUmProduto()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);

        $this->assertInstanceOf(Produto::class, $maiorEMenor->getMenor());
        $this->assertInternalType("object", $maiorEMenor->getMenor());
        $this->assertEquals("Geladeira", $maiorEMenor->getMenor()->getNome());

        $this->assertInstanceOf(Produto::class, $maiorEMenor->getMaior());
        $this->assertInternalType("object", $maiorEMenor->getMaior());
        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->getNome());
    }
}