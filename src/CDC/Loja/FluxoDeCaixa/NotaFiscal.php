<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Class NotaFiscal
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class NotaFiscal
{

    /**
     * @var string
     */
    private $cliente;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * NotaFiscal constructor.
     *
     * @param $cliente
     * @param $valor
     * @param $data
     */
    public function __construct($cliente, $valor, $data)
    {
        $this->cliente = $cliente;
        $this->valor   = $valor;
        $this->data    = $data;
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}