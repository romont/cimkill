<?php

namespace Momar\Form;

use Zend\Form\Form;

class EmployeeForm extends Form {

    public function __construct($name = null) {
        parent::__construct('employee');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'employeeId',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'fName',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'lName',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
            'name' => 'password',
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'securityLevel',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'voicemailBox',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'divisionId',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'repcode',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required',
            ),
        ));
    }

}

?>
