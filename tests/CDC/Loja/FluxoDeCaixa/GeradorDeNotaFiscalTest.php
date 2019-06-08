<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Exemplos\RelogioDoSistema;
use CDC\Loja\Test\TestCase;
use CDC\Loja\Tributos\Tabela;
use Mockery;

/**
 * Class GeradorDeNotaFiscalTest
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class GeradorDeNotaFiscalTest extends TestCase
{

    /**
     * Deve invocar ações posteriores
     */
    public function testDeveInvocarAcoesPosteriores()
    {
        $primeiraAcao = Mockery::mock(AcaoAposGerarNotaInterface::class);
        $primeiraAcao->shouldReceive("executa")->andReturn(true);

        $segundaAcao = Mockery::mock(AcaoAposGerarNotaInterface::class);
        $segundaAcao->shouldReceive("executa")->andReturn(true);

        $tabela = Mockery::mock(Tabela::class);
        $tabela->shouldReceive('paraValor')->with(1000.0)->andReturn(0.2);

        $gerador = new GeradorDeNotaFiscal([$primeiraAcao, $segundaAcao], new RelogioDoSistema(), $tabela);
        $pedido  = new Pedido("Fernando", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($primeiraAcao->executa($nf));
        $this->assertTrue($segundaAcao->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class, $nf);
    }

    /**
     * Deve consultar a tabela para calcular o valor
     */
    public function testDeveConsultarATabelaParaCalcularValor()
    {
        $tabela = Mockery::mock(Tabela::class);
        $tabela->shouldReceive('paraValor')->with(1000)->andReturn(0.2);

        $gerador = new GeradorDeNotaFiscal([], new RelogioDoSistema(), $tabela);
        $pedido  = new Pedido("Fernando", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertEquals(1000 * 0.2, $nf->getValor(), null, 0.00001);
    }
}