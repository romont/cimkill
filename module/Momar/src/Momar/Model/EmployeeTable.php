<?php
namespace Momar\Model;

use Zend\Db\TableGateway\TableGateway;

class EmployeeTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getEmployee($employeeId)
    {
        $employeeId = (int) $employeeId;
        $rowset = $this->tableGateway->select(array('employeeId' => $employeeId));
        $row = $rowset->current();
        if(!$row)
        {
            return array();
        }
        return $row;
    }

    public function saveEmployee(Employee $employee)
    {
        $data = array(
            'fName'     => $employee->fName,
            'lName'     => $employee->lName,
            'password'  => $employee->password,
            'email'     => $employee->email,
            'securityLevel' => $employee->securityLevel,
            'voicemailBox'  => $employee->voicemailBox,
            'divisionId'    => $employee->divisionId,
            'title'     => $employee->title,
            'repcode'   => $employee->repcode
        );

        $employeeId = (int) $employee->employeeId;
        if($employeeId == 0)
        {
            $this->tableGateway->insert($data);
            $employeeId = $this->tableGateway->getLastInsertValue();
            return $employeeId;
        } else {
            if($this->getEmployee($employeeId)) {
                $this->tableGateway->update($data, array('employeeId' => $employeeId));
                return $employeeId;
            } else {
                return false;
            }
        }
    }

    public function deleteEmployee($employeeId)
    {
        $this->tableGateway->delete(array('employeeId' => $employeeId));

    }
}