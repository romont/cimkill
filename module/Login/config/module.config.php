<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Login\Controller\Login' => 'Login\Controller\LoginController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Login\Controller\Login',
                    ),
                ),
                'view_manager' => array(
                    'template_path_stack' => array(
                        'login' => __DIR__ . '/../view',
                    ),
                    'layout' => 'layout/plain',
                ),
            ),
        ),
    ),
);
?>
