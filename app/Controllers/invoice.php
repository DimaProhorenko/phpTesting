<?php

use app\App;
use app\Container;
use app\Core\Invoice;
use app\Core\Services\EmailService;

echo 'Invoice';
(new Container())->get(Invoice::class)->process([], 245);
