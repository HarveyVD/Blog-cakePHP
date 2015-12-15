<?php

App::uses('AppController', 'Controller');

class StudentsController extends AppController {

    public $components = array('Paginator', 'Flash');
    public $paginate = array();
    public $helpers = array('Paginator', 'Html');

    public function index() {

        $sex_config = Configure::read('student.sex');

        $full_name = trim($this->request->query('full_name')); // đặt tên field trong form search không giống với trường field trong database
        $sex = $this->request->query('sex');
        $date_start = trim($this->request->query('date_start'));
        $date_end = trim($this->request->query('date_end'));

        $options = array(
            'limit' => 3,
        );

        // nếu full_name khác rỗng tức là full_name có độ dài chuỗi lớn hơn 0
        // khi này mới thực hiện tạo conditions search theo full_name
        // tương tự như các trường khác, khi người dùng không nhập vào giá trị gì thì không thực hiện search theo giá trị đó
        // chú ý tìm kiếm kiểu LIKE
        // LOWER(Student.full_name) - LOWER là 1 function trong Mysql dùng để convert dữ liệu trong database sang kiểu chữ viết thường
        // mb_strtolower($full_name) - mb_strtolower là 1 function trong PHP dùng để convert dạng chữ tiếng việt sang kiểu chữ viết thường
        if (strlen($full_name)) {

            $options['conditions']['LOWER(Student.full_name) LIKE'] = '%' . mb_strtolower($full_name) . '%';
        }

        if (strlen($sex)) {

            $options['conditions']['Student.sex'] = $sex;
        }

        if (strlen($date_start)) {

            $options['conditions']['Student.birth_day >='] = date('Y-m-d', strtotime($date_start));
        }

        if (strlen($date_end)) {

            $options['conditions']['Student.birth_day <='] = date('Y-m-d', strtotime($date_end));
        }

        //chuan bi cau truy van query theo cach cua cakePHP
        $this->Paginator->settings = $options;

        $students = $this->Paginator->paginate('Student');
        $this->set(compact('students', 'sex_config'));
    }

    public function add() {
        $this->edit();
    }

    /**
     * edit
     * về bản chất view của edit giống hệt view của add
     * thế nên xóa view edit.ctp đi, tìm hiểu cách để edit sử dụng được view trong add.ctp
     * @param type $id
     * @return type
     * @throws NotFoundException
     */
    public function edit($id = null) {
        if ($this->request->referer() != '/') {
            $this->request->data['Student']['referer'] = $this->request->referer();
        } else {
            $this->request->data['Student']['referer'] = 'index';
        }
        
        $this->set('referer',  $this->request->data['Student']['referer']);
        //new
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Student']['birth_day'] = date('Y-m-d', strtotime(trim($this->request->data['Student']['birth_day'])));
            if ($this->Student->save($this->request->data)) {
                $this->redirect(array(
                    'controller' => 'Students',                  
                    'action' => 'index'
                ));
            }
        }
        if (!is_null($id)) {
            $this->data = $this->Student->findById($id);
        }
        $this->render('form');
    }

    public function delete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Student->delete($id)) {
            $this->Flash->set(__('The post with id: %s has been deleted.', h($id)));
        } else {
            $this->Flash->set(__('The post with id: %s could not be deleted.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
