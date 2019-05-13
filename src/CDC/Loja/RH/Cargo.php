<?php


namespace CDC\Loja\RH;

use RuntimeException;

class Cargo
{

    /**
     * Regra de cálculo por cargo
     *
     * @var array
     */
    private $cargos = [
        TabelaCargos::DESENVOLVEDOR => DezOuVintePorcento::class,
        TabelaCargos::DBA           => QuinzeOuVintePorCento::class,
        TabelaCargos::TESTADOR      => QuinzeOuVintePorCento::class,
    ];

    /**
     * @var \CDC\Loja\RH\RegraDeCalculo
     */
    private $regra;

    /**
     * Cargo constructor.
     *
     * @param $regra
     */
    public function __construct($regra)
    {
        if (array_key_exists($regra, $this->cargos)) {
            $this->regra = $this->cargos[$regra];
        } else {
            throw new RuntimeException("Cargo inválido");
        }
    }

    /**
     * @return \CDC\Loja\RH\RegraDeCalculo|mixed
     */
    public function getRegra()
    {
        return $this->regra;
    }
}