<?php

App::uses('Controller', 'AppController');
App::uses('AuthComponent', 'Controller/Component');

class AuthController extends AppController {

    var $uses = array('User');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('Signup', 'Signout');
    }

    public function Signup() {
        if ($this->Auth->loggedIn()) {
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Ban da dang ky thanh cong.', 'default', array('class' => 'alert alert-info'), 'info');
                return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
            } else {
                $this->Flash->set(__('Unable to add user'));
            }
        }
    }

    public function Signin() {
        //Nếu người dùng đã đăng nhập thì điều hướng đến homes khi truy cập signin trên thanh địa chỉ
        if ($this->Auth->loggedIn()) {
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        if ($this->request->is('post')) {           
//            $this->User->set($this->request->data);                                    
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                    $this->Session->setFlash('Dang nhap thanh cong', 'default',array('class' => 'alert alert-info'), 'info');
                } else {
                    $this->Session->setFlash('email or password is incorrect', 'default', array('class' => 'alert alert-info'), 'info');
                    
                }
            
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
