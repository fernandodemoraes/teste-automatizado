<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Test\Builder\CarrinhoDeComprasBuilder;
use CDC\Loja\Test\TestCase;

class CarrinhoDeComprasTest extends TestCase
{

    /**
     * @var \CDC\Loja\Carrinho\CarrinhoDeCompras
     */
    private $carrinho;

    /**
     * Set up
     */
    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    /**
     * Carrinho vazio
     */
    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = (new CarrinhoDeComprasBuilder())->comItens()->cria();

        $valor = $this->carrinho->maiorValor($carrinho);

        $this->assertEquals(0, $valor,  null, 0.0001);
    }

    /**
     * Carrinho com um produto
     */
    public function testDeveRetornarCarrinhoCom1Elemento()
    {
        $carrinho = (new CarrinhoDeComprasBuilder())->comItens(900.00)->cria();

        $valor = $this->carrinho->maiorValor($carrinho);

        $this->assertEquals(900.00, $valor,  null, 0.0001);
    }

    /**
     * Carrinho com vários produtos
     */
    public function testDeveRetornarCarrinhoComMuitosElementos()
    {
        $carrinho = (new CarrinhoDeComprasBuilder())->comItens(900.00, 1500.00, 750.00)->cria();

        $valor = $this->carrinho->maiorValor($carrinho);

        $this->assertEquals(1500.00, $valor,  null, 0.0001);
    }
}