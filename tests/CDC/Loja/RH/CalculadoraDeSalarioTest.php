<?php

namespace CDC\Loja\RH;

use PHPUnit_Framework_TestCase as PHPUnit;

class CalculadoraDeSalarioTest extends PHPUnit
{
    /**
     * Calcular salário do desenvolvedor abaixo do limite
     */
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Fernando", 1500.0, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calcularSalario($desenvolvedor);

        $this->assertEquals(1500.0 * 0.9, $salario, null, 0.00001);
    }

    /**
     * Calcular salário do desenvolvedor acima do limite
     */
    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Teyla", 4000.0, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calcularSalario($desenvolvedor);

        $this->assertEquals(4000.0 * 0.8, $salario, null, 0.00001);
    }

    /**
     * Calcular salário do DBA abaixo do limite
     */
    public function testCalculoSalarioDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Ítalo", 1500.00, TabelaCargos::DBA);
        $salario = $calculadora->calcularSalario($dba);

        $this->assertEquals(1500.00 * 0.85, $salario, null, 0.00001);
    }

    /**
     * Calcular salário do DBA abaixo do limite
     */
    public function testCalculoSalarioDBAsComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Castiel", 4500.00, TabelaCargos::DBA);
        $salario = $calculadora->calcularSalario($dba);

        $this->assertEquals(4500.00 * 0.75, $salario, null, 0.00001);
    }
}