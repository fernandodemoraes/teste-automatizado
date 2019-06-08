<?php

namespace CDC\Loja\RH;

/**
 * Class CalculadoraDeSalario
 *
 * @package CDC\Loja\RH
 */
class CalculadoraDeSalario
{

    /**
     * Calcula o salário do funcionário
     *
     * @param \CDC\Loja\RH\Funcionario $funcionario
     * @return float
     */
    public function calcularSalario(Funcionario $funcionario)
    {
        $cargo = new Cargo($funcionario->getCargo());

        return  $cargo->getRegra()->calcula($funcionario);
    }
}