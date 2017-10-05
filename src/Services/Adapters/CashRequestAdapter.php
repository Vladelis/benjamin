<?php
namespace Ebanx\Benjamin\Services\Adapters;

class CashRequestAdapter extends RequestAdapter
{
    public function transform()
    {
        $transformed = parent::transform();
        $transformed->bypass_boleto_screen = true;

        return $transformed;
    }
}
