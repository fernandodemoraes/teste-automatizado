<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;
use ArrayObject;

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
        $this->produtos = new ArrayObject();
    }

    /**
     * @param Produto $produto
     */
    public function adiciona(Produto $produto)
    {
        $this->produtos->append($produto);
    }

    /**
     * @return ArrayObject
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * Encontra o maior preço do carrinho
     *
     * @param \CDC\Loja\Carrinho\CarrinhoDeCompras $carrinhoDeCompras
     * @return int
     */
    public function maiorValor(CarrinhoDeCompras $carrinhoDeCompras)
    {
        if (count($carrinhoDeCompras->getProdutos()) === 0) {
            return 0;
        }

        $maiorValor = $carrinhoDeCompras->getProdutos()[0]->getValorTotal();

        foreach ($carrinhoDeCompras->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValorTotal()) {
                $maiorValor = $produto->getValorTotal();
            }
        }

        return $maiorValor;
    }
}