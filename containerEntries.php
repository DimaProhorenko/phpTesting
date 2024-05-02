<?php

use app\Container;
use app\Core\Invoice;
use app\Core\Services\EmailService;
use app\Core\Services\GatewayService;
use app\Core\Services\SalesTaxService;

$container->set(
    Invoice::class,
    fn (Container $c) => new Invoice($c->get(SalesTaxService::class), $c->get(GatewayService::class), $c->get(EmailService::class))
);

$container->set(
    SalesTaxService::class,
    fn (Container $c) => new SalesTaxService()
);

$container->set(
    GatewayService::class,
    fn (Container $c) => new GatewayService()
);


$container->set(
    EmailService::class,
    fn (Container $c) => new EmailService()
);
