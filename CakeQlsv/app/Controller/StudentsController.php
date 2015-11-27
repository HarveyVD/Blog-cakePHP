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

    /**
     * 
     * chuyển những code trong search vào index phía trên cho đúng chuẩn
     * những trang danh sách luôn mặc đinh là index
     */
    public function search() {
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
            $s = $this->request->query; // không khởi tạo biến thừa như thế này
            // khi sử dụng $this->request->query[] dấu móc vuông phải cẩn thận, khi không tồn tại sẽ bắn ra notice
            // sử dụng $this->request->query() dấu móc tròn thì khi không tồn tại sẽ không bắn ra notice, mà sẽ trả về giá trị null
            $full_name = $this->request->query['search_name']; // đặt tên trường field trong form search không giống với trường field trong database
            $sex = $this->request->query['option'];
            if ($this->request->query['date_start'] != NULL) {
                $date_start = date('Y-m-d', strtotime($this->request->query['date_start']));
            }
            if ($this->request->query['date_end'] != NULL) {
                $date_end = date('Y-m-d', strtotime($this->request->query['date_end']));
            }
            $conditions = array('conditions' => array(
                    'Student.full_name LIKE' => $full_name, // search LIKE kiểu như này là search LIKE kiểu chính xác, Tìm hiểu search LIKE theo %%, search chữ hoa hay chữ in thường vẫn search được
                    'Student.sex =' => $sex,
                    // search birth_day kiểu như này sẽ không tìm kiếm được khi không nhập đủ $date_start và $date_end. 
                    // làm lại kiểu khi chỉ nhập $date_start sẽ tiềm kiếm các bản ghi có birth_day >= $date_start đó
                    // hoặc nếu chỉ nhập $date_end sẽ tìm kiếm các bản ghi có birth_day <= $date_end đó, nhập vào cả 2 thì tìm kiếm được trong khoảng birth_day <= $date_end && birth_day >= $date_start
                    'Student.birth_day BETWEEN ? and ?' => array(
                        $date_start, $date_end
                    )
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
        }

        // Phía trên đã dùng 1 truy vấn $this->Paginator->paginate(), dưới này lại dùng find
        // về ý nghĩa dùng $this->Student->find('all') là hoàn toàn sai, nó không dùng để phân trang
        // Sửa lại ghép điều kiện $conditions vào chính $this->Paginator->paginate() ở phía trên
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
