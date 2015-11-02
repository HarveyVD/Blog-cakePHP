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
class PostsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) { // Kiểm tra xem yêu cầu có phải dạng post hay k?
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.')); // đối tượng $this->Flash lấy từ đâu thế?
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to add your post.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Post']['id'] = $id;        
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }

        if (empty($this->request->data)) {
            $this->request->data = $post;
        }
    }
    public function delete($id = null){
        // Dòng này không cần thiết
        if(!$id){
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        // If ở đây cũng ko cần thiết
        if(!$post){
            throw new NotFoundExceptioon(__('Invalid post'));
        }
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Session->setFlash(__('The post with id: $s has been deleted', h($id)));
        }else{
            $this->Session->setFlash(__('The post with id : $s could not be deleted.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
