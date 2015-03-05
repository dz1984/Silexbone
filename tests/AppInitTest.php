<?php 
require_once __DIR__.'/../vendor/autoload.php';

use Silex\WebTestCase;

class AppInitTest extends WebTestCase
{
    public function createApplication()
    {
        $app =  require_once __DIR__.'/../src/app.php';
        $app['debug'] = true;

        return $app;
    }

    public function testCleint()
    {
        $client = $this->createClient();
        $client->request('GET', '/welcome');

        $this->assertTrue($client->getResponse()->isOk());
    }
}