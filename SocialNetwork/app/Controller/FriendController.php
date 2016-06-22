<?php

class FriendController extends AppController {

    var $uses = array('User');

    public function index() {
        $friends = array();
        $user = array();
        $user['User'] = $this->Auth->user();
        $getNameOrUsername = array();
        
        
        $friends = $this->User->friends($user);

        
        foreach ($friends as $friend) {
            $getNameOrUsername[] = $this->User->getNameOrUsername($friend);
        }
        $requests = $this->User->friendRequests($user);
        $getNameOrUsernames = array();
        foreach ($requests as $user11) {
            $getNameOrUsernames[] = $this->User->getNameOrUsername($user11);
        }

        $this->set('getNameOrUsername', $getNameOrUsername);
        $this->set('getNameOrUsernames', $getNameOrUsernames);
        if (isset($friends)) {
            $this->set('friends', $friends);
        }
        $this->set('requests', $requests);
    }
    public function AddFriend($username = NULL){
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $this->request->params['username']
            )
        ));
        
        if (!$user) {
            $this->Session->setFlash('That user could not be found', 'default', array('class' => 'alert alert-info'), 'info');
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        if($this->Auth->user('id') === $user['User']['id']){
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        
        if($this->User->friendRequests($user)){
            foreach($this->User->friendRequests($user) as $user1){
                if($user1['User']['id'] == $this->Auth->user('id')){
                    $this->Session->setFlash('Friend request already pending', 'default', array('class' => 'alert alert-info'), 'info');
                    return $this->redirect(array('controller'=>'Profile','action'=>'Profile','username' => $user['User']['username']));
                }
            }
        }
        if($this->User->friendRequests($this->Auth->user())){
            foreach($this->User->friendRequests($this->Auth->user()) as $user1){
                if($user1['User']['id'] == $user['User']['id']){
                    $this->Session->setFlash('Friend request already pending', 'default', array('class' => 'alert alert-info'), 'info');
                    return $this->redirect(array('controller'=>'Profile','action'=>'Profile','username' => $user['User']['username']));
                }
            }
        }
        $is_friend = array();
        foreach ($this->User->friends($user) as $friend){
            if($friend['User']['id'] == $this->Auth->user('id')){
                $this->Session->setFlash('You are already friends', 'default', array('class' => 'alert alert-info'), 'info');
                return $this->redirect(array('controller'=>'Profile','action'=>'Profile','username' => $user['User']['username']));
            }
        }
        $this->User->Friend->create();
        $data = array(
            "user_id" => $user['User']['id'],
            "friend_id" => $this->Auth->user('id')
        );
        Controller::loadModel('User');
        $this->User->Friend->save($data);
        $this->Session->setFlash('Friend request sent.', 'default', array('class' => 'alert alert-info'), 'info');
        return $this->redirect(array('controller'=>'Profile','action'=>'Profile','username' => $user['User']['username']));
        
    }
    public function Accept($username){
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $this->request->params['username']
            )
        ));
        
        if (!$user) {
            $this->Session->setFlash('That user could not be found', 'default', array('class' => 'alert alert-info'), 'info');
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        if(!$this->User->AcceptfriendRequest($user)){
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        $id_accept = $this->User->Friend->find('first',array(
            'conditions' => array(
                "user_id" => $this->Auth->user('id'),
                "friend_id" => $user['User']['id'],
                "accepted" => FALSE,
            ),
           
        ));
        
        $this->User->Friend->create();
        
        $data = array(
            "user_id" => $this->Auth->user('id'),
            "friend_id" => $user['User']['id'],
            "accepted" => TRUE,
            "id" => $id_accept['Friend']['id']
        );
        Controller::loadModel('User');
        $this->User->Friend->save($data);
        $this->Session->setFlash('Friend request accepted', 'default', array('class' => 'alert alert-info'), 'info');
        return $this->redirect(array('controller'=>'Profile','action'=>'Profile','username' => $user['User']['username']));
    }
}
