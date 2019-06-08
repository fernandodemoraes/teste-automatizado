<?php

namespace CDC\Loja\FluxoDeCaixa;

use ArrayObject;

/**
 * Class ProcessadorDeBoletos
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class ProcessadorDeBoletos
{

    /**
     * Processar boleto
     *
     * @param \ArrayObject $boletos
     * @param \CDC\Loja\FluxoDeCaixa\Fatura $fatura
     */
    public function processar(ArrayObject $boletos, Fatura $fatura)
    {
        foreach ($boletos as $boleto) {
            $pagamento = new Pagamento($boleto->getValor(), MeioPagamento::BOLETO);
            $fatura->adicionarPagamento($pagamento);
        }
    }
}