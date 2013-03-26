<?php

namespace Momar;

//import statements
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Momar\Model\Employee;
use Momar\Model\EmployeeTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Momar\Model\MyAuthStorage' => function($sm) {
                    return new \Momar\Model\MyAuthStorage('employee');
                },
                'AuthService' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    //$dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'employee', 'email', 'password');
                    $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter);

                    $dbTableAuthAdapter
                            ->setTableName('employee')
                            ->setIdentityColumn('email')
                            ->setCredentialColumn('password');

                    $authService = new AuthenticationService();
                    $authService->setAdapter($dbTableAuthAdapter);
                    $authService->setStorage($sm->get('Momar\Model\MyAuthStorage'));

                    return $authService;
                },
                'Momar\Model\EmployeeTable' => function($sm) {
                    $tableGateway = $sm->get('EmployeeTableGateway');
                    $table = new EmployeeTable($tableGateway);
                    return $table;
                },
                'EmployeeTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Employee());
                    return new TableGateway('employee', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}

?>
