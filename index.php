<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/core/bootstrap.php';

use Core\{Router, Request};

Router::load('routes.php')
        ->direct(Request::uri(), Request::method());
