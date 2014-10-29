<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app->before(
    function (Request $request) use ($app) {
        $app['basepath'] = $request->getBasePath();
        $app['assetpath'] = $request->getBasePath() . $app['config']['asset_config']['default_path'];
    }
);

$app->get('/', 
    function() use ($app) {
         $user = $app['session']->get('user');
        if (null == $user) {
            return $app->redirect('./login');
        }

        return $app['twig']->render('index.twig', 
            [
                'name' => $user['username']                   
            ]
        );
});

$app->match('/login', 
    function(Request $request) use ($app) {
        $form = $app['form.factory']->createBuilder('form')
                    ->add('email','email',['attr' => ['label'=>'帳號', 'class' => 'lab']])
                    ->add('password', 'password')
                    ->add('Login', 'submit')
                    ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $email = $data->email;
            $pwd = $data->password;
            
            $app['session']->set('user', ['username'=> 'Silexbone']);
            return $app->redirect('./');
        }

        return $app['twig']->render('login.twig', 
            [
                'name' => 'Silexbone',
                'formView' => $form->createView()
            ]
        );
    }
);



