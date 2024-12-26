<?php

require_once __DIR__ . '/src/Autoloader.php';

use App\Autoloader;

$autoloader = new Autoloader();
$autoloader->register();

// Map namespaces to directories
$autoloader->addNamespace('App\\Controllers', __DIR__ . '/src/Controllers');
$autoloader->addNamespace('App\\Models', __DIR__ . '/src/Models');
$autoloader->addNamespace('App', __DIR__ . '/src');

