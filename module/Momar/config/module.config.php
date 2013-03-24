<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Momar\Controller\Employee' => 'Momar\Controller\EmployeeController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Momar' => array(
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
            /* 'may_terminate' => true,
              'child_routes' => array(
              'client' => array(
              'type' => 'Segment',
              'options' => array(
              'route' => '/client[/:action]',
              'constraints' => array(
              'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
              'defaults' => array(
              'controller' => 'EmployeeClient',
              'action' => 'index'
              ),
              ),
              ),
              ), */
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
