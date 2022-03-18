<?php

session_start();

use src\routes\Router;

require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();
