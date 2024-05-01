<?php

namespace Core;

class Invoice
{
    public function process(array $customer, float $value): bool
    {
        $salesTaxService = new class
        {
            public function calculate(float $amount, array $customer)
            {
                echo "Calculate taxes";
                return 14;
            }
        };
        $gatewayService = new class
        {
            public function charge(float $amount, array $customer, $tax)
            {
                echo "Charging";
            }
        };
        $emailService = new class
        {
            public function send(array $customer, string $receipt)
            {
                echo 'Sending';
            }
        };

        $tax = $salesTaxService->calculate($value, $customer);

        if (!$gatewayService->charge($value, $customer, $tax)) {
            return false;
        }

        return true;
    }
}
