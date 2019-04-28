<?php

namespace CDC\Exemplos;

class ConversorDeNumeroRomano
{
    /**
     * Tabela
     *
     * @var array
     */
    protected $tabela = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000,
    ];

    /**
     * Converte o número romano para inteiro
     *
     * @param $numeroRomano
     * @return int|mixed
     */
    public function converte($numeroRomano)
    {
        $acumulador = 0;
        $ultimoVizinhoDaDireita = 0;

        for ($iterador = strlen($numeroRomano) - 1; $iterador >=0; $iterador--) {

            $atual = 0;
            $numeroCorrente = $numeroRomano[$iterador];

            if (array_key_exists($numeroCorrente, $this->tabela)) {
                $atual += $this->tabela[$numeroCorrente];
            }

            $multiplicador = 1;

            if ($atual < $ultimoVizinhoDaDireita) {
                $multiplicador = -1;
            }

            $ultimoVizinhoDaDireita = $atual;

            $acumulador += $atual * $multiplicador;
        }

        return $acumulador;
    }
}