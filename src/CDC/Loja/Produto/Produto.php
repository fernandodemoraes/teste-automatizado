<?php

namespace CDC\Loja\Produto;

/**
 * Class Produto
 *
 * @package CDC\Loja\Produto
 */
class Produto
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var float
     */
    private $valorUnitario;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * Produto constructor.
     *
     * @param $produto
     * @param $valorUnitario
     * @param int $quantidade
     */
    public function __construct($produto, $valorUnitario, $quantidade = 1)
    {
        $this->nome          = $produto;
        $this->valorUnitario = $valorUnitario;
        $this->quantidade    = $quantidade;
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
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * @param float $valorUnitario
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

    /**
     * @return int
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param int $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * Valor total
     *
     * @return float|int
     */
    public function getValorTotal()
    {
        return $this->valorUnitario * $this->quantidade;
    }
}