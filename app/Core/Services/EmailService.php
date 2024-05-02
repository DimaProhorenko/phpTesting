<?php

namespace app\Core\Services;

class EmailService
{
    public function send(array $customer, string $receipt = 'receipt'): bool
    {
        sleep(1);
        return true;
    }
}
