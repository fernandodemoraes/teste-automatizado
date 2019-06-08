<?php

namespace CDC\Loja\Persistencia;

use CDC\Loja\Produto\Produto;

/**
 * Class ProdutoDao
 *
 * @package CDC\Loja\Persistencia
 */
class ProdutoDao
{

    /**
     * @var \PDO
     */
    private $conexao;

    /**
     * ProdutoDao constructor.
     *
     * @param \PDO $conexao
     */
    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    /**
     * Grava o produto
     *
     * @param \CDC\Loja\Produto\Produto $produto
     * @return \PDO
     */
    public function adiciona(Produto $produto)
    {
        $sql = "INSERT INTO produto ";
        $sql .= "(descricao, valor_unitario, status) ";
        $sql .= "VALUES (?, ?, ?) ";

        $stm = $this->conexao->prepare($sql);

        $stm->bindParam(1, $produto->getDescricao());
        $stm->bindParam(2, $produto->getValorUnitario());
        $stm->bindParam(3, $produto->getStatus());

        $stm->execute();

        return $this->conexao;
    }

    /**
     * Pesquisa por id
     *
     * @param $id
     * @return mixed
     */
    public function porId($id)
    {
        $sql = "SELECT * FROM produto WHERE id = " . $id;
        $consulta = $this->conexao->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Produtos ativos
     *
     * @return mixed
     */
    public function ativos()
    {
        $sql = "SELECT * FROM produto WHERE status = 1";
        $consulta = $this->conexao->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }
}