<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Class Pagamento
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class Pagamento
{

    /**
     * @var float
     */
    private $valor;

    /**
     * @var string
     */
    private $meioPagamento;

    /**
     * Pagamento constructor.
     *
     * @param $valor
     * @param $meioPagamento
     */
    public function __construct($valor, $meioPagamento)
    {
        $this->valor         = $valor;
        $this->meioPagamento = $meioPagamento;
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