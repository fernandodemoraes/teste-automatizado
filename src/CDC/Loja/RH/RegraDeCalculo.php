<?php

namespace CDC\Loja\RH;

/**
 * Class RegraDeCalculo
 *
 * @package CDC\Loja\RH
 */
abstract class RegraDeCalculo
{

    /**
     * Faz o cálculo dos salários dos funcionários
     *
     * @param \CDC\Loja\RH\Funcionario $funcionario
     * @return float|int
     */
    public function calcula(Funcionario $funcionario)
    {
        $salario = $funcionario->getSalario();

        if ($salario > $this->limite()) {
            return $salario * $this->porcentagemAcimaDoLimite();
        }

        return $salario * $this->porcentagemBase();
    }

    /**
     * Limite
     */
    protected function limite()
    {
    }

    /**
     * Porcentagem acima do limite
     */
    protected function porcentagemAcimaDoLimite()
    {
    }

    /**
     * Porcentagem base
     */
    protected function porcentagemBase()
    {
    }
}