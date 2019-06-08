<?php

namespace CDC\Loja\Tributos;

/**
 * Interface TabelaInterface
 *
 * @package CDC\Loja\Tributos
 */
interface TabelaInterface
{

    /**
     * @param $valor
     * @return mixed
     */
    public function paraValor($valor);
}