<?php

namespace CDC\Loja\Produto;


class Produto
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var float
     */
    private $valor;

    /**
     * Produto constructor.
     *
     * @param $produto
     * @param $valor
     */
    public function __construct($produto, $valor)
    {
        $this->nome    = $produto;
        $this->valor   = $valor;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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