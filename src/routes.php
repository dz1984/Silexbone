<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app->before(
    function (Request $request) use ($app) {
        $app['basepath'] = $request->getBasePath();
    }
);

$app->get('/', 
    function() use ($app) {
    //return 'Welcome, it is running on Silex';
        return $app['twig']->render('index.twig', 
            [
                'name' => 'Donald'
            ]
        );
    }
);



