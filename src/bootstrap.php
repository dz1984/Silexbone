<?php

use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\LocaleServiceProvider;
use Silex\Provider\SessionServiceProvider;
// Register service provider
$app->register(new DoctrineServiceProvider(), $config['database_config']);
$app->register(new TwigServiceProvider(), $config['template_config']);
$app->register(new FormServiceProvider());
$app->register(new LocaleServiceProvider());
$app->register(new TranslationServiceProvider());
$app->register(new SessionServiceProvider());


