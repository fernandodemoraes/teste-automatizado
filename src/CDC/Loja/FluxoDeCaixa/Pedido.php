<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Class Pedido
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class Pedido
{

    /**
     * @var string
     */
    private $cliente;

    /**
     * @var float
     */
    private $valorTotal;

    /**
     * @var int
     */
    private $quantidadeDeItens;

    /**
     * Pedido constructor.
     *
     * @param $cliente
     * @param $valorTotal
     * @param $quantidadeDeItens
     */
    public function __construct($cliente, $valorTotal, $quantidadeDeItens)
    {
        $this->cliente           = $cliente;
        $this->valorTotal        = $valorTotal;
        $this->quantidadeDeItens = $quantidadeDeItens;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param mixed $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeDeItens()
    {
        return $this->quantidadeDeItens;
    }

    /**
     * @param mixed $quantidadeDeItens
     */
    public function setQuantidadeDeItens($quantidadeDeItens)
    {
        $this->quantidadeDeItens = $quantidadeDeItens;
    }
}