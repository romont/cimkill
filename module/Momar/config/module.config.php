<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Momar\Controller\Employee' => 'Momar\Controller\EmployeeController',
            'Momar\Controller\Auth' => 'Momar\Controller\AuthController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'employee' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/momar/employee[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Momar\Controller',
                        'controller' => 'Employee',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Momar\Controller',
                        'controller' => 'Auth',
                    ),
                ),
                /*'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),*/
            ),
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
?>
