<?php

use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

// Register service provider
$app->register(new DoctrineServiceProvider(), $config['database_config']);
$app->register(new TwigServiceProvider(), $config['template_config']);




