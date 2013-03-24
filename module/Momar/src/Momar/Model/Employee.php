<?php
namespace Momar\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Employee
{
    public $employeeId;
    public $fName, $lName, $password, $email, $securityLevel, $voicemailBox, $divisionId, $title, $repcode;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->employeeId   = (isset($data['employeeId'])) ? $data['employeeId'] : null;
        $this->fName        = (isset($data['fName'])) ? $data['fName'] : null;
        $this->lName        = (isset($data['lName'])) ? $data['lName'] : null;
        $this->password     = (isset($data['password'])) ? $data['password'] : null;
        $this->email        = (isset($data['email'])) ? $data['email'] : null;
        $this->securityLevel= (isset($data['securityLevel'])) ? $data['securityLevel'] : null;
        $this->voicemailBox = (isset($data['voicemailBox'])) ? $data['voicemailBox'] : null;
        $this->divisionId   = (isset($data['divisionId'])) ? $data['divisionId'] : null;
        $this->title        = (isset($data['title'])) ? $data['title'] : null;
        $this->repcode      = (isset($data['repcode'])) ? $data['repcode'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if(!$this->inputFilter)
        {
            $inputFilter    = new InputFilter();
            $factory        = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'      => 'employeeId',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'fName',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'lName',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'password',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'email',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'securityLevel',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'voicemailBox',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'divisionId',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'title',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'      => 'repcode',
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'   => 1,
                            'max'   => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}

?>
