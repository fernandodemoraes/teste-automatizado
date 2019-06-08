<?php


namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase;
use ArrayObject;

/**
 * Class ProcessadorDeBoletosTest
 *
 * @package CDC\Loja\FluxoDeCaixa
 */
class ProcessadorDeBoletosTest extends TestCase
{

    /**
     * Deve processar o pagamento por boleto único
     */
    public function testDeveProcessarPagamentoViaBoletoUnico()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new Fatura('Cliente', 150.0);

        $boletos = new ArrayObject();
        $boletos->append(new Boleto(150.0));

        $processador->processar($boletos, $fatura);

        $this->assertEquals(1, count($fatura->getPagamentos()));
        $this->assertEquals(150.0, $fatura->getPagamentos()[0]->getValor(), null, 0.00001);
    }

    /**
     * Deve processar o pagamento por muitos boletos
     */
    public function testDeveProcessarPagamentoViaMuitosBoletos()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new Fatura('Cliente', 150.0);

        $boletos = new ArrayObject();
        $boletos->append(new Boleto(100.0));
        $boletos->append(new Boleto(200.0));

        $processador->processar($boletos, $fatura);

        $valor1 = $fatura->getPagamentos()[0]->getValor();
        $valor2 = $fatura->getPagamentos()[1]->getValor();

        $this->assertEquals(2, count($fatura->getPagamentos()));
        $this->assertEquals(100.0, $valor1, null, 0.00001);
        $this->assertEquals(200.0, $valor2, null, 0.00001);
    }

    /**
     * Deve marcar a fatura como pago caso o boleto único pague tudo
     */
    public function testDeveMarcarFaturaComoPagoCasoBoletoUnicoPagueTudo()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new Fatura('Cliente', 150.0);

        $boletos = new ArrayObject();
        $boletos->append(new Boleto(150.0));

        $processador->processar($boletos, $fatura);

        $this->assertTrue($fatura->isPago());
    }
}