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

$app->get('/welcome', 
    function() {
        return 'ok';
});

$app->match('/login', 
    function(Request $request) use ($app) {
        $form = $app['form.factory']->createBuilder('form')
                    ->add('email', 'text', ['label' => ' ', 'attr' => ['class' => 'lab', 'placeholder' => 'Username']])
                    ->add('password',  'text', ['label' => ' ', 'attr' => ['placeholder' => 'Password']])
                    ->add('Login', 'submit', ['attr' => ['class' => 'uk-button uk-button-primary']])
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



