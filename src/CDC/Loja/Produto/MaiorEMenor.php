<?php

namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorEMenor
{
    /**
     * @var Produto
     */
    private $menor;

    /**
     * @var Produto
     */
    private $maior;

    /**
     * @param CarrinhoDeCompras $carrinho
     */
    public function encontra(CarrinhoDeCompras $carrinho)
    {
        foreach ($carrinho->getProdutos() as $produto) {
            if (empty($this->menor) || $produto->getValorUnitario() < $this->menor->getValorUnitario()) {
                $this->menor = $produto;
            }

            if (empty($this->maior) || $produto->getValorUnitario() > $this->maior->getValorUnitario()) {
                $this->maior = $produto;
            }
        }
    }

    /**
     * @return Produto
     */
    public function getMaior()
    {
        return $this->maior;
    }

    /**
     * @return Produto
     */
    public function getMenor()
    {
        return $this->menor;
    }
}