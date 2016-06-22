<?php

App::uses('Controller', 'AppController');
App::uses('AuthComponent', 'Controller/Component');

class ProfileController extends AppController {

    var $uses = array('User');

    public function Profile($username = NULL) {
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $this->request->params['username']
            )
        ));
        if (!$user) {
            throw new NotFoundException('404');
        }

        // Tên của người dùng được tìm kiếm từ search model chuyển qua : $getNameOrUsername
        $getFirstNameOrUsername = $this->User->getFirstNameOrUsername($user);
        $getNameOrUsername = $this->User->getNameOrUsername($user);
        
        foreach ($this->User->friends($user) as $user11) {
            $getNameOrUsernames[] = $this->User->getNameOrUsername($user11);
        }
        if (isset($getNameOrUsernames)) {
            $this->set('getNameOrUsernames', $getNameOrUsernames);
        }
        /**
         * Gửi yêu cầu kết bạn
         */
        
        $array = array();
        $friendRequestsPendings = $this->User->friendRequests($user);
        
        if (isset($friendRequestsPendings)) {
            foreach ($friendRequestsPendings as $friendRequestsPending) {
                if ($friendRequestsPending['User']['id'] == $this->Auth->user('id') && $user['User']['id'] != $this->Auth->user('id')) {
                    $array = $friendRequestsPending;
                    
                }
            }
            
        }
        $this->set('friendRequestPending',$array);
        /**
         * Nhận yêu cầu kết bạn
         */
        $received = array();
        $friendRequestsReceiveds = $this->User->AcceptfriendRequest($user);
        
        if (isset($friendRequestsReceiveds)) {
            foreach ($friendRequestsReceiveds as $friendRequestsReceived) {
                if ($friendRequestsReceived['User']['id'] == $this->Auth->user('id') && $this->Auth->user('id') != $user['User']['id']) {
                    $received = $friendRequestsReceived;
                    
                }
            }           
        }
        $is_friend = array();
        foreach ($this->User->friends($user) as $friend){
            if($friend['User']['id'] == $this->Auth->user('id')){
                $is_friend = $friend;
            }
        }
        
        $this->set('username',$user['User']['username']);
        $this->set('is_friend',$is_friend);
        $this->set('friendRequestReceived', $received);
        $this->set('getNameOrUsername', $getNameOrUsername);
        $this->set('getFirstNameOrUsername', $getFirstNameOrUsername);
        $this->set('user', $user);
        $this->set('friends', $this->User->friends($user));
    }

    public function Edit() {

        if ($this->request->is('post')) {


            $this->User->id = $this->request->data['User']['id'];

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Ban da update thanh cong.', 'default', array('class' => 'alert alert-info'), 'info');
                return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
            } else {
                $this->Flash->set(__('Unable to edit user'));
            }
        }
    }

}
