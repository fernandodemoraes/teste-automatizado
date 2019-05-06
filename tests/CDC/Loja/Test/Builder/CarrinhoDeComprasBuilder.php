<?php

namespace CDC\Loja\Test\Builder;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{

    /**
     * @var \CDC\Loja\Carrinho\CarrinhoDeCompras
     */
    public $carrinho;

    /**
     * CarrinhoDeComprasBuilder constructor.
     */
    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    /**
     * Gera os itens
     *
     * @return $this
     */
    public function comItens()
    {
        $valores = func_get_args();

        foreach ($valores as $valor) {
            $this->carrinho->adiciona(new Produto("Item", $valor, 1));
        }

        return $this;
    }

    /**
     * Cria o carrinho
     *
     * @return \CDC\Loja\Carrinho\CarrinhoDeCompras
     */
    public function cria()
    {
        return $this->carrinho;
    }
}