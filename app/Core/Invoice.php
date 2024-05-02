<?php

namespace app\Core;

use app\Core\Services\EmailService;
use app\Core\Services\GatewayService;
use app\Core\Services\SalesTaxService;

class Invoice
{
    public function __construct(public SalesTaxService $salesTaxService, public GatewayService $gatewayService, public EmailService $emailService)
    {
    }
    public function process(array $customer, float $value): bool
    {
        $tax = $this->salesTaxService->calculate($value, $customer);

        if (!$this->gatewayService->charge($value, $customer, $tax)) {
            return false;
        }

        echo 'Invoice has been processed';

        $this->emailService->send($customer);
        return true;
    }
}
