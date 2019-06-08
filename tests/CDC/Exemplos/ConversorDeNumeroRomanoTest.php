<?php

namespace CDC\Exemplos;

use \PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Class ConversorDeNumeroRomanoTest
 *
 * @package CDC\Exemplos
 */
class ConversorDeNumeroRomanoTest extends PHPUnit
{
    /**
     * Converter o símbolo I
     */
    public function testDeveEntenderOSimboloI()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("I");
        $this->assertEquals(1, $numero);
    }

    /**
     * Converte o símbolo V
     */
    public function testDeveEntenderOSimboloV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("V");
        $this->assertEquals(5, $numero);
    }

    /**
     * Converte o símbolo II
     */
    public function testDeveEntenderOSimboloII()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("II");
        $this->assertEquals(2, $numero);
    }

    /**
     * Converte o símbolo XXII
     */
    public function testDeveEntenderOSimboloXXII()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXII");
        $this->assertEquals(22, $numero);
    }

    /**
     * Converte o símbolo IX
     */
    public function testDeveEntenderOSimboloIX()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("IX");
        $this->assertEquals(9, $numero);
    }

    /**
     * Converte o símbolo XXIV
     */
    public function testDeveEntenderOSimboloXXIV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXIV");
        $this->assertEquals(24, $numero);
    }
}