<?php

namespace CDC\Loja\Persistencia;

use CDC\Loja\Produto\Produto;
use CDC\Loja\Test\TestCase;

/**
 * Class ProdutoDaoTest
 *
 * @package CDC\Loja\Persistencia
 */
class ProdutoDaoTest extends TestCase
{

    /**
     * @var \PDO
     */
    private $conexao;

    /**
     * Set up
     */
    protected function setUp()
    {
        parent::setUp();

        $this->conexao = new \PDO("sqlite:/tmp/test.db");

        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, \PDO::ATTR_ERRMODE_EXECEPTION);

        $this->criaTabela();
    }

    /**
     * Cria uma tabela
     */
    protected function criaTabela()
    {
        $sql = "CREATE TABLE produto ";
        $sql .= "(id INTEGER PRIMARY KEY, descricao TEXT, )";
        $sql .= "valor_unitario TEXT, status TINYINT(1));";

        $this->conexao->query($sql);
    }

    /**
     * Deve adicionar um produtor
     */
    public function testDeveAdicionarUmProduto()
    {
        $conn = (new ConexaoComBancoDeDados())->getConexao();
        $produtoDao = new ProdutoDao($conn);

        $produto = new Produto("Geladeira", 150.0);

        $produtoDao->adiciona($produto);

        $salvo = $produtoDao->porId($conn->lastInsertId());

        $this->assertEquals($salvo["descricao"], $produto->getDescricao());
        $this->assertEquals($salvo["valor_unitario"], $produto->getValorUnitario());
        $this->assertEquals($salvo["status"], $produto->getStatus());
    }

    /**
     * Deve filtrar os produtos ativos
     */
    public function testDeveFiltrarAtivos()
    {
        $produtoDao = new ProdutoDao($this->conexao);

        $ativo = new Produto("Geladeira", 150.0);
        $inativo = new Produto("Geladeira", 180.0);
        $inativo->inativa();

        $produtoDao->adiciona($ativo);
        $produtoDao->adiciona($inativo);

        $produtosAtivos = $produtoDao->ativos();

        $this->assertEquals(1, count($produtosAtivos));
        $this->assertEquals(150.0, $produtosAtivos[0]["valor_unitario"]);
    }

    /**
     * Tear down
     */
    protected function tearDown()
    {
        parent::tearDown();
        unlink("/tmp/test.db");
    }
}