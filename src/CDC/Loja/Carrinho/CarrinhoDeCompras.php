<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;

/**
 * Class CarrinhoDeCompras
 *
 * @package CDC\Loja\Carrinho
 */
class CarrinhoDeCompras
{
    /**
     * @var \ArrayObject
     */
    private $produtos;

    public function __construct()
    {
        $this->produtos = new \ArrayObject();
    }

    /**
     * @param Produto $produto
     */
    public function adiciona(Produto $produto)
    {
        $this->produtos->append($produto);
    }

    /**
     * @return \ArrayObject
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @return int
     */
    public function maiorValor()
    {
        if (count($this->getItens()) === 0) {
            return 0;
        }

        $maiorValor = $this->getProdutos()[0]->getValor();

        foreach ($this->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValor()) {
                $maiorValor = $produto->getValor();
            }
        }

        return $maiorValor;
    }
}