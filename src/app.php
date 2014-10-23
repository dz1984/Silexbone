<?php
require_once __DIR__.'/../vendor/autoload.php';
use Silex\Application;

$app = new Application();

require __DIR__.'/config.php';
require __DIR__.'/routes.php';
require __DIR__.'/bootstrap.php';

return $app;
