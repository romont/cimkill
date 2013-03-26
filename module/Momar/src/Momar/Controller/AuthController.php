<?php

namespace Momar\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Form\Annotation\AnnotationBuilder;
use Momar\Form\LoginForm;
use Zend\View\Model\JsonModel;
use Momar\Model\Employee;

class AuthController extends AbstractRestfulController {

    protected $form;
    protected $storage;
    protected $authservice;

    public function get($id) {
        return new JsonModel(array("data" => 0));
    }

    public function getList() {
        return new JsonModel(array("data" => 0));
    }

    public function create($data) {
        $form = new LoginForm();

        $form->setData($data);
        if ($form->isValid()) {
            //check authentication...
            $this->getAuthService()->getAdapter()
                    ->setIdentity($data->email)
                    ->setCredential($data->password);

            $result = $this->getAuthService()->authenticate();
            foreach ($result->getMessages() as $message) {
                //save message temporary into flashmessenger
                $this->flashmessenger()->addMessage($message);
            }

            if ($result->isValid()) {
                //$redirect = 'application';
                //check if it has rememberMe :
                if ($data->rememberMe == 1) {
                    $this->getSessionStorage()
                            ->setRememberMe(1);
                    //set storage again
                    $this->getAuthService()->setStorage($this->getSessionStorage());
                }
                $this->getAuthService()->getStorage()->write($data->email);
                return new JsonModel(array('success' => true));
            } else {
                return new JsonModel(array('success' => false));
            }
        }
    }

    public function update($id, $data) {
        return new JsonModel(array("data" => 0));
    }

    public function delete($id) {
        return new JsonModel(array("data" => 0));
    }

    public function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()
                    ->get('AuthService');
        }

        return $this->authservice;
    }

    public function getSessionStorage() {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()
                    ->get('Login\Model\MyAuthStorage');
        }

        return $this->storage;
    }

    public function getForm() {
        if (!$this->form) {
            $this->form = new LoginForm();
        }

        return $this->form;
    }

    public function authenticate($data) {
        $form = $this->getForm();
        $redirect = 'application';

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                //check authentication...
                $this->getAuthService()->getAdapter()
                        ->setIdentity($request->getPost('email'))
                        ->setCredential($request->getPost('password'));

                $result = $this->getAuthService()->authenticate();
                foreach ($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }

                if ($result->isValid()) {
                    $redirect = 'application';
                    //check if it has rememberMe :
                    if ($request->getPost('rememberme') == 1) {
                        $this->getSessionStorage()
                                ->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('email'));
                }
            }
        }

        return $this->redirect()->toRoute($redirect);
    }

}
