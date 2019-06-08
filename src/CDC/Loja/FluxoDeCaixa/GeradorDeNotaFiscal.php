<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Exemplos\RelogioInterface;
use CDC\Loja\Tributos\TabelaInterface;

/**
 * Class GeradorDeNotaFiscal
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class GeradorDeNotaFiscal
{

    /**
     * @var \stdClass
     */
    private $acoes;

    /**
     * @var \CDC\Exemplos\RelogioInterface
     */
    private $relogio;

    /**
     * @var \CDC\Loja\Tributos\TabelaInterface
     */
    private $tabela;

    /**
     * GeradorDeNotaFiscal constructor.
     *
     * @param $acoes
     * @param \CDC\Exemplos\RelogioInterface $relogio
     * @param \CDC\Loja\Tributos\TabelaInterface $tabela
     */
    public function __construct($acoes, RelogioInterface $relogio, TabelaInterface $tabela)
    {
        $this->acoes   = $acoes;
        $this->relogio = $relogio;
        $this->tabela  = $tabela;
    }

    /**
     * Gera a nota fiscal
     *
     * @param \CDC\Loja\FluxoDeCaixa\Pedido $pedido
     * @return \CDC\Loja\FluxoDeCaixa\NotaFiscal
     */
    public function gera(Pedido $pedido)
    {
        $valorTabela = $this->tabela->paraValor($pedido->getValorTotal());
        $valorTotal  = $pedido->getValorTotal() * $valorTabela;

        $nf = new NotaFiscal($pedido->getCliente(), $valorTotal, $this->relogio->hoje());

        foreach ($this->acoes as $acao) {
            $acao->executa($nf);
        }

        return $nf;
    }
}