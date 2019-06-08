<?php

namespace CDC\Loja\RH;

/**
 * Class DezOuVintePorcento
 *
 * @package CDC\Loja\RH
 */
class DezOuVintePorcento extends RegraDeCalculo
{

    /**
     * Porcentagem base
     *
     * @return float|void
     */
    protected function porcentagemBase()
    {
        return 0.9;
    }

    /**
     * Porcentagem acima do limite
     *
     * @return float|void
     */
    protected function porcentagemAcimaDoLimite()
    {
        return 0.8;
    }

    /**
     * Limite
     *
     * @return int|void
     */
    protected function limite()
    {
        return 3000;
    }
}