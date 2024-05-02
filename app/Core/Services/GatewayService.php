<?php

namespace app\Core\Services;

class GatewayService
{
    public function charge(float $amount, array $customer, $tax): bool
    {
        sleep(1);
        return (bool) mt_rand(0, 1);
    }
}
