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
            if (empty($this->menor) || $produto->getValor() < $this->menor->getValor()) {
                $this->menor = $produto;
            }

            if (empty($this->maior) || $produto->getValor() > $this->maior->getValor()) {
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