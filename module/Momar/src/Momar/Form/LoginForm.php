<?php

namespace Momar\Form;

use Zend\Form\Form;

class LoginForm extends Form {
    public function __construct($name = null) {
        parent::__construct('login');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'attributes' => array(
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
            'type' => 'Zend\Form\Element\Submit',
            'name' => 'Submit',
        ));
    }

}