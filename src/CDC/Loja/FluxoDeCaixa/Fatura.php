<?php

namespace CDC\Loja\FluxoDeCaixa;

/**
 * Class Fatura
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class Fatura
{

    /**
     * @var \ArrayObject
     */
    private $pagamentos;

    /**
     * @var string
     */
    private $cliente;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var bool
     */
    private $pago;

    /**
     * Fatura constructor.
     *
     * @param $cliente
     * @param $valor
     */
    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor   = $valor;
    }

    /**
     * Adiciona o pagamento
     *
     * @param \CDC\Loja\FluxoDeCaixa\Pagamento $pagamento
     */
    public function adicionarPagamento(Pagamento $pagamento)
    {
        $this->pagamentos->append($pagamento);

        $valorTotal = 0;

        foreach ($this->pagamentos as $pagamento) {
            $valorTotal += $pagamento->getValor();
        }

        if ($valorTotal >= $this->valor) {
            $this->pago = true;
        }
    }

    /**
     * @return \ArrayObject
     */
    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    /**
     * @param \ArrayObject $pagamentos
     */
    public function setPagamentos($pagamentos)
    {
        $this->pagamentos = $pagamentos;
    }

    /**
     * Verifica se a fatura está paga
     *
     * @return bool
     */
    public function isPago()
    {
        if ($this->pago) {
            return $this->pago;
        }

        return false;
    }
}