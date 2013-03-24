<?php
namespace MomarTest\Controller;

use MomarTest\Bootstrap;
use Momar\Controller\EmployeeController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use PHPUnit_Framework_TestCase;

class EmployeeControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller   = new EmployeeController();
        $this->request      = new Request();
        $this->routeMatch   = new RouteMatch(array('controller' => 'index'));
        $this->event        = new MvcEvent();
        $config = $serviceManager->get('config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);
    }

    public function testGetListCanBeAccessed() {
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetCanBeAccessed() {
        $this->routeMatch->setParam('id', '1');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateCanBeAccessed()
    {
        $this->request->setMethod('post');
        $this->request->getPost()->set('fName', 'TestfName');
        $this->request->getPost()->set('lName', 'TestlName');
        $this->request->getPost()->set('password', 'password');
        $this->request->getPost()->set('email', 'test@momar.com');
        $this->request->getPost()->set('securityLevel', '62');
        $this->request->getPost()->set('voicemailBox', '354');
        $this->request->getPost()->set('divisionId', '2');
        $this->request->getPost()->set('title', 'Sales Representative');
        $this->request->getPost()->set('repcode', 'S5');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdateCanBeAccessed()
    {
        $this->routeMatch->setParam('id', '103');
        $this->request->setMethod('put');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeleteCanBeAccessed()
    {
        $this->routeMatch->setParam('id', '1');
        $this->request->setMethod('delete');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetEmployeeTableReturnsAnInstanceOfEmployeeTable()
    {
        $this->assertInstanceOf('Momar\Model\EmployeeTable', $this->controller->getEmployeeTable());
    }
}