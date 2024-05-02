<?php

namespace app;

use app\Container;
use app\Core\Invoice;
use app\Core\Services\EmailService;
use app\Core\Services\GatewayService;
use app\Core\Services\SalesTaxService;

class App
{
    private static Container $container;


    public function __construct()
    {
        static::$container = new Container();
        static::defineContainerEntries();
    }
    private static function defineContainerEntries()
    {
        static::$container->set(
            Invoice::class,
            fn (Container $c) => new Invoice($c->get(SalesTaxService::class), $c->get(GatewayService::class), $c->get(EmailService::class))
        );

        static::$container->set(
            SalesTaxService::class,
            fn (Container $c) => new SalesTaxService()
        );

        static::$container->set(
            GatewayService::class,
            fn (Container $c) => new GatewayService()
        );


        static::$container->set(
            EmailService::class,
            fn (Container $c) => new EmailService()
        );
    }

    public static function container(): Container
    {
        return static::$container;
    }
}
