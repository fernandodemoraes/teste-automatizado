<?php

namespace CDC\Loja\Tributos;

use CDC\Loja\FluxoDeCaixa\Pedido;

/**
 * Class CalculadoraDeImposto
 *
 * @package CDC\Loja\Tributos
 */
class CalculadoraDeImposto
{

    /**
     * @var \CDC\Loja\Tributos\Tabela
     */
    protected $tabela;

    /**
     * CalculadoraDeImposto constructor.
     *
     * @param \CDC\Loja\Tributos\Tabela $tabela
     */
    public function __construct(Tabela $tabela)
    {
        $this->tabela = $tabela;
    }

    /**
     * Calcula os impostos
     *
     * @param \CDC\Loja\FluxoDeCaixa\Pedido $pedido
     * @return float|int
     */
    public function calculaImposto(Pedido $pedido)
    {
        $taxa = $this->tabela->paraValor($pedido->getValorTotal());

        return $pedido->getValorTotal() * $taxa;
    }
}