<?php

App::uses('AppController', 'Controller');

class StudentsController extends AppController {

    public $components = array('Paginator');
    public $paginate = array();
    public $helpers = array('Paginator', 'Html');

    public function index() {
        //chuan bi cau truy van query theo cach cua cakePHP
        $this->Paginator->settings = array(
          'limit' => 3,
        'order' => array('id' => 'desc')
        );
        // we are using the 'User' model
        $data = $this->Paginator->paginate('Student');
        $this->set(compact('data'));
        // không cần thiết bắt chặt như thế này ở kiểu get
        // bỏ câu if else này đi
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        } else {

            // khi sử dụng $this->request->query[] dấu móc vuông phải cẩn thận, khi không tồn tại sẽ bắn ra notice
            // sử dụng $this->request->query() dấu móc tròn thì khi không tồn tại sẽ không bắn ra notice, mà sẽ trả về giá trị null
            
                $full_name = $this->request->query('full_name'); // đặt tên field trong form search không giống với trường field trong database
            
            
            $sex = $this->request->query('sex');
            
            
            if ($this->request->query('date_start') != NULL) {
                $date_start = date('Y-m-d', strtotime($this->request->query('date_start')));
                
            }
            if ($this->request->query('date_end') != NULL) {
                $date_end = date('Y-m-d', strtotime($this->request->query('date_end')));
            }
            
            $conditions = array('conditions' => array(
                    'Student.full_name LIKE' => '%' . $full_name . '%', 
                    'Student.sex =' => $sex,
                    'Student.birth_day >=' => $date_start,
                    'Student.birth_day <=' => $date_end,                 
            ));
            // không hiểu mục đích của kiểu foreach này để làm j?
            // đang định làm hàm tìm kiếm động theo các trường field có trong database ?
            // giải thích đoạn foreach lồng nhau này, không bao giờ được viết đoạn code nào mà lồng nhau nhiều cấp như thế này
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
            //$this->Paginator->settings = array(
              //  'conditions' => $conditions,
                //'limit' => 3
            //);
            //$data = $this->Paginator->paginate('Student');
            //$this->set(compact('data'));
        }

        // Phía trên đã dùng 1 truy vấn $this->Paginator->paginate(), dưới này lại dùng find
        // về ý nghĩa dùng $this->Student->find('all') là hoàn toàn sai, nó không dùng để phân trang
        // Sửa lại ghép điều kiện $conditions vào chính $this->Paginator->paginate() ở phía trên
        //$search = $this->Student->find('all', $conditions);
        //$this->set('students', $search);
    }

    /**
     * 
     * chuyển những code trong search vào index phía trên cho đúng chuẩn
     * những trang danh sách luôn mặc đinh là index
     */
    public function search() {
        
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


