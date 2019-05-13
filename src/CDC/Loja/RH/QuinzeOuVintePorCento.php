<?php


namespace CDC\Loja\RH;

class QuinzeOuVintePorCento extends RegraDeCalculo
{

    /**
     * Porcentagem base
     *
     * @return float|void
     */
    protected function porcentagemBase()
    {
        return 0.85;
    }

    /**
     * Porcentagem acima do limite
     *
     * @return float|void
     */
    protected function porcentagemAcimaDoLimite()
    {
        return 0.75;
    }

    /**
     * Limite
     *
     * @return int|void
     */
    protected function limite()
    {
        return 2500;
    }
}