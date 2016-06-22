<?php
class SearchController extends AppController{
    var $uses = array('User');
    public function Results(){
        $query = $this->request->query('query');
     
        if(!$query){
            return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        
        $users = $this->User->find('all', array(
            'conditions' => array(
                'OR' => array(
                    $this->User->getVirtualField('first-last-name'). ' LIKE' => '%'.$query.'%', 
                    'User.username LIKE' => '%'.$query.'%'
                    ))
        ));       
        $getNameOrUsernames = array();
        foreach ($users as $user){
            $getNameOrUsernames[] = $this->User->getNameOrUsername($user);
           
        }       
        $this->set('getNameOrUsernames',$getNameOrUsernames);
        $this->set('users',$users);
    }
}
