<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class StudentsController extends AppController {

    public $components = array('Paginator');
    public $paginate = array();
    public $helpers = array('Paginator', 'Html');

    public function index() {
        
    }

    public function search() {
        //chuan bi cau truy van query theo cach cua cakePHP
        $this->Paginator->settings = array(
            
            'limit' => 3,
            'order' => array('id' => 'desc')
        );

        // we are using the 'User' model
        $data = $this->Paginator->paginate('Student');
        $this->set(compact('data'));
        
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        } else {
            $s = $this->request->query;
            $full_name = $this->request->query['search_name'];
            $sex = $this->request->query['option'];
            if ($this->request->query['date_start'] != NULL) {
                $date_start = date('Y-m-d', strtotime($this->request->query['date_start']));
            }
            if ($this->request->query['date_end'] != NULL) {
                $date_end = date('Y-m-d', strtotime($this->request->query['date_end']));
            }
            $conditions = array('conditions' => array(
                    'Student.full_name LIKE' => $full_name,
                    'Student.sex =' => $sex,
                    'Student.birth_day BETWEEN ? and ?' => array(
                        $date_start, $date_end
                    )
            ));
            foreach ($conditions as $key_conditions => $values) {
                foreach ($values as $key_field => $value_field) {
                    if (!is_array($value_field)) {
                        if (!strlen(trim($value_field))) {
                            unset($conditions[$key_conditions][$key_field]);
                        }
                    } else {
                        foreach ($value_field as $key => $value) {
                            if (!strlen(trim($value))) {
                                unset($conditions[$key_conditions][$key_field]);
                            }
                        }
                    }
                }
            }
        }
        $search = $this->Student->find('all', $conditions);
        $this->set('students', $search);
    }

    public function add() {
        if ($this->request->referer() != '/') {
            $this->request->data['Student']['referer'] = $this->request->referer();
        } else {
            $this->request->data['Student']['referer'] = 'index';
        }
        $this->set('referer', $this->request->data['Student']['referer']);
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
        if ($this->request->referer() != '/') {
            $this->request->data['Student']['referer'] = $this->request->referer();
        } else {
            $this->request->data['Student']['referer'] = 'index';
        }
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $student = $this->Student->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if (isset($this->request->data['Student']['birth_day'])) {
                $this->request->data['Student']['birth_day'] = date('Y-m-d', strtotime($this->request->data['Student']['birth_day']));
            }
            $this->request->data['Student']['id'] = $id;

            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'search'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        if (!$this->request->data) {
            $this->request->data = $student;
        }
        $this->set('referer', $this->request->data['Student']['referer']);
    }

    public function delete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Student->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
        } else {
            $this->Session->setFlash(__('The post with id: %s could not be deleted.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
