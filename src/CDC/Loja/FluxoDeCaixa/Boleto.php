<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Class Boleto
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class Boleto
{

    /**
     * @var float
     */
    private $valor;

    /**
     * Boleto constructor.
     *
     * @param $valor
     */
    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
}