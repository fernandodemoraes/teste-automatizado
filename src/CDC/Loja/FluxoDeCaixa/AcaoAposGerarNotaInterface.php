<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Interface AcaoAposGerarNotaInterface
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
interface AcaoAposGerarNotaInterface
{

    /**
     * Executa
     *
     * @param \CDC\Loja\FluxoDeCaixa\NotaFiscal $nf
     * @return mixed
     */
    public function executa(NotaFiscal $nf);
}