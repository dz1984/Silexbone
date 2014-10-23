<?php

use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

// Register service provider
$app->register(new DoctrineServiceProvider(), $database_config);
$app->register(new TwigServiceProvider(), $template_config);




