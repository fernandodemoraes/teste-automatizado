<?php

namespace CDC\Loja\RH;

class Funcionario
{
    /**
     * @var string
     */
    protected $nome;

    /**
     * @var float
     */
    protected $salario;

    /**
     * @var string
     */
    protected $cargo;

    /**
     * Funcionario constructor.
     *
     * @param $nome
     * @param $salario
     * @param $cargo
     */
    public function __construct($nome, $salario, $cargo)
    {
        $this->nome    = $nome;
        $this->salario = $salario;
        $this->cargo   = $cargo;
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
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param float $salario
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    /**
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param string $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
}