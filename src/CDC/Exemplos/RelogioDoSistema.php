<?php

namespace CDC\Exemplos;

use DateTime;

/**
 * Class RelogioDoSistema
 *
 * @package CDC\Exemplos
 */
class RelogioDoSistema implements RelogioInterface
{

    /**
     * Data de hoje
     *
     * @return bool|\DateTime
     */
    public function hoje()
    {
        return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    }
}