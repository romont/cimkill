<?php
namespace MomarTest\Model;

use Momar\Model\Employee;
use PHPUnit_Framework_TestCase;

class EmployeeTest extends PHPUnit_Framework_TestCase
{
    public function testEmployeeInitialState()
    {
        $employee = new Employee();

        $this->assertNull($employee->employeeId, '"employeeId" should initially be null');
        $this->assertNull($employee->fName, '"fName" should initially be null');
        $this->assertNull($employee->lName, '"lName" should initially be null');
        $this->assertNull($employee->password, '"password" should initially be null');
        $this->assertNull($employee->email, '"email" should initially be null');
        $this->assertNull($employee->securityLevel, '"securityLevel" should initially be null');
        $this->assertNull($employee->voicemailBox, '"voicemailBox" should initially be null');
        $this->assertNull($employee->divisionId, '"divisionId" should initially be null');
        $this->assertNull($employee->title, '"title" should initially be null');
        $this->assertNull($employee->repcode, '"repcode" should initially be null');
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $employee = new Employee();

        $data = array(
            'employeeId'        => 888,
            'fName'             => "first_name",
            'lName'             => "last_name",
            'password'          => "pword",
            'email'             => "test@momar.com",
            'securityLevel'     => 68,
            'voicemailBox'      => "345",
            'divisionId'        => 3,
            'title'             => "Sales Representative",
            'repcode'           => "3S"
        );

        $employee->exchangeArray($data);

        $this->assertSame($data['employeeId'], $employee->employeeId, '"employeeId" was not set correctly');
        $this->assertSame($data['fName'], $employee->fName, '"fName" was not set correctly');
        $this->assertSame($data['lName'], $employee->lName, '"lName" was not set correctly');
        $this->assertSame($data['password'], $employee->password, '"password" was not set correctly');
        $this->assertSame($data['email'], $employee->email, '"email" was not set correctly');
        $this->assertSame($data['securityLevel'], $employee->securityLevel, '"securityLevel" was not set correctly');
        $this->assertSame($data['voicemailBox'], $employee->voicemailBox, '"voicemailBox" was not set correctly');
        $this->assertSame($data['divisionId'], $employee->divisionId, '"divisionId" was not set correctly');
        $this->assertSame($data['title'], $employee->title, '"title" was not set correctly');
        $this->assertSame($data['repcode'], $employee->repcode, '"repcode" was not set correctly');
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $employee = new Employee();

        $employee->exchangeArray(array(
            'employeeId'        => 888,
            'fName'             => "first_name",
            'lName'             => "last_name",
            'password'          => "pword",
            'email'             => "test@momar.com",
            'securityLevel'     => 68,
            'voicemailBox'      => "345",
            'divisionId'        => 3,
            'title'             => "Sales Representative",
            'repcode'           => "3S"
        ));

        $employee->exchangeArray(array());

        $this->assertNull($employee->employeeId, '"employeeId" should have defaulted to null');
        $this->assertNull($employee->fName, '"fName" should have defaulted to null');
        $this->assertNull($employee->lName, '"lName" should have defaulted to null');
        $this->assertNull($employee->password, '"password" should have defaulted to null');
        $this->assertNull($employee->email, '"email" should have defaulted to null');
        $this->assertNull($employee->securityLevel, '"securityLevel" should have defaulted to null');
        $this->assertNull($employee->voicemailBox, '"voicemailBox" should have defaulted to null');
        $this->assertNull($employee->divisionId, '"divisionId" should have defaulted to null');
        $this->assertNull($employee->title, '"title" should have defaulted to null');
        $this->assertNull($employee->repcode, '"repcode" should have defaulted to null');
    }
}