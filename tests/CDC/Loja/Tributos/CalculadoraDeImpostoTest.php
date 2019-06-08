<?php

namespace CDC\Loja\Tributos;

use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\Test\TestCase;
use Mockery;

/**
 * Class CalculadoraDeImpostoTest
 *
 * @package CDC\Loja\Tributos
 */
class CalculadoraDeImpostoTest extends TestCase
{

    /**
     * Imposto para pedidos superiores a 2000 reais
     */
    public function testImpostoParaPedidosSuperiorA2000Reais()
    {
        $tabela = Mockery::mock(Tabela::class);
        $tabela->shouldReceive("paraValor")->with(2.500)->andReturn(0.1);

        $pedido = new Pedido("Fernando", 2.500, 3);
        $calculadora = new CalculadoraDeImposto($tabela);

        $valor = $calculadora->calculaImposto($pedido);

        $this->assertEquals((2.500 * 0.1), $valor, null, 0.00001);
    }
}