<?php

namespace Momar\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Momar\Model\Employee;
use Momar\Model\EmployeeTable;
use Momar\Form\EmployeeForm;
use Zend\View\Model\JsonModel;

class EmployeeController extends AbstractRestfulController {

    protected $employeeTable;

    public function get($id) {
        $employee = $this->getEmployeeTable()->getEmployee($id);

        return new JsonModel(array(
            'data' => $employee,
        ));
    }

    public function getList() {
        $results = $this->getEmployeeTable()->fetchAll();

        $data = array();
        foreach ($results as $result) {
            $data[] = $result;
        }

        return new JsonModel(array(
            'data' => $data,
        ));
    }

    public function create($data) {
        $form = new EmployeeForm();
        $employee = new Employee();
        $form->setInputFilter($employee->getInputFilter());
        $form->setData($data);
        if($form->isValid())
        {
            $employee->exchangeArray($form->getData());
            $employeeId = $this->getEmployeeTable()->saveEmployee($employee);
        }

        return (isset($employeeId)) ? new JsonModel(array('success' => 1, 'data' => $this->getEmployeeTable()->getEmployee($employeeId))) : new JsonModel(array('success' => 0));
    }

    public function update($id, $data) {
        $data['employeeId'] = $id;
        $employee = $this->getEmployeeTable()->getEmployee($id);
        $form = new EmployeeForm();
        $form->bind($employee);
        $form->setInputFilter($employee->getInputFilter());
        $form->setData($data);
        if($form->isValid())
        {
            $employeeId = $this->getEmployeeTable()->saveEmployee($form->getData());
        }
        return (isset($employeeId)) ?  new JsonModel(array('success' => 1, 'data' => $this->getEmployeeTable()->getEmployee($employeeId),)) : new JsonModel(array('success' => 0));
    }

    public function delete($id) {
        $this->getEmployeeTable()->deleteEmployee($id);

        return new JsonModel(array('success' => 1));
    }

    // configure response
    public function getResponseWithHeader() {
        $response = $this->getResponse();
        $response->getHeaders()
                //make can accessed by *
                ->addHeaderLine('Access-Control-Allow-Origin', '*')
                //set allow methods
                ->addHeaderLine('Access-Control-Allow-Methods', 'POST PUT DELETE GET');

        return $response;
    }

    public function getEmployeeTable() {
        if (!$this->employeeTable) {
            $sm = $this->getServiceLocator();
            $this->employeeTable = $sm->get('Momar\Model\EmployeeTable');
        }
        return $this->employeeTable;
    }

}