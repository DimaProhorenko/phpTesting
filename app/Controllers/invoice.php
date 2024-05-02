<?php

use app\App;
use app\Core\Invoice;

echo 'Invoice';
App::container()->get(Invoice::class)->process([], 234);
