<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    var $name = 'User';
    public $useTable = 'users'; // Sử dụng table users
    public $virtualFields = array(
        'first-last-name' => 'CONCAT(first_name, " ", last_name)' //Không nên dùng đầy đủ User.first_name : có thể gây ra lỗi SQL nếu có các model liên quan
    );

    /**
     * Returns an array of restaurants based on a kitchen id
     * @param string $kitchenId - the id of a kitchen
     * @return array of restaurants
     */
    public $hasAndBelongsToMany = array(
        'friendsOfMine' => array(
            'className' => 'User',
            'joinTable' => 'friends',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'friend_id',
            'unique' => 'keepExisting',
        ),
        'friendOf' => array(
            'className' => 'User',
            'joinTable' => 'friends',
            'foreignKey' => 'friend_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
        ),
    );
    public $validate = array(
        'email' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'The email field is required'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This email is already taken.'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'The email must be a valid email address'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => "Your email can't contain more than 255 characters."
            ),
        ),
        'username' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'The username field is required'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This username is already taken.'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => "Your last name can't contain more than 255 characters."
            ),
            'char' => array(
                'rule' => '|^[a-zA-Z ]*$|',
                'message' => 'Username must be letters'
            ),
        ),
        'password' => array(
            'minLength' => array(
                'rule' => array('minLength', 6),
                'message' => "The password must be at least 6 characters."
            ),
        ),
        'first_name' => array(
            'maxLength' => array(
                'rule' => array('maxLength', 50),
                'message' => "Your first name can't contain more than 50 characters."
            ),
            'char' => array(
                'rule' => '|^[a-zA-Z ]*$|',
                'message' => 'First name must be letters'
            ),
        ),
        'last_name' => array(
            'maxLength' => array(
                'rule' => array('maxLength', 50),
                'message' => "Your first name can't contain more than 50 characters."
            ),
            'char' => array(
                'rule' => '|^[a-zA-Z ]*$|',
                'message' => 'First name must be letters'
            ),
        ),
        'location' => array(
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => "Location can't contain more than 20 characters."
            )
        )
    );

    public function friends($user = array()) {
        $friends = array();
        $values = array();
        $friendsOfMine = array();
        $friendOf = array();
        if (isset($user['User']['id'])) {
            $friendsOfMine = $this->Friend->find('all', array(
                'fields' => array('Friend.friend_id'),
                'conditions' => array(
                    'Friend.user_id' => $user['User']['id'],
                    'Friend.accepted' => TRUE
                ),
            ));

            foreach ($friendsOfMine as $key => $value) {
                array_push($values, $value['Friend']['friend_id']);
            }
            $friendsOfMine =  $this->find('all', array(
                        'contain' => FALSE,
                        'conditions' => array(
                            'User.id' => $values
                        ),
            ));
            $friendOf = $this->Friend->find('all', array(
                'fields' => array('Friend.user_id'),
                'conditions' => array(
                    'Friend.friend_id' => $user['User']['id'],
                    'Friend.accepted' => TRUE
                ),
            ));
            foreach ($friendOf as $key => $value) {
                array_push($values, $value['Friend']['user_id']);
            }
            $friendOf =  $this->find('all', array(
                        'contain' => FALSE,
                        'conditions' => array(
                            'User.id' => $values
                        ),
            ));
            $friends = array_merge($friendsOfMine,$friendOf);
            return array_unique($friends,SORT_REGULAR);
        }
    }

    public function friendRequests($user = array()) {
        $friends = array();
        $values = array();
        if (isset($user['User']['id'])) {
            $friends = $this->Friend->find('all', array(
                'fields' => array('Friend.friend_id'),
                'conditions' => array(
                    'Friend.user_id' => $user['User']['id'],
                    'Friend.accepted' => FALSE
                ),
            ));

            foreach ($friends as $key => $value) {
                array_push($values, $value['Friend']['friend_id']);
            }
            return $this->find('all', array(
                        'contain' => FALSE,
                        'conditions' => array(
                            'User.id' => $values
                        ),
            ));
        }
    }
    public function AcceptfriendRequest($user= array()){
        $friends = array();
        $values = array();
        if (isset($user['User']['id'])) {
            $friends = $this->Friend->find('all', array(
                'fields' => array('Friend.user_id'),
                'conditions' => array(
                    'Friend.friend_id' => $user['User']['id'],
                    'Friend.accepted' => FALSE
                ),
            ));

            foreach ($friends as $key => $value) {
                array_push($values, $value['Friend']['user_id']);
            }
            return $this->find('all', array(
                        'contain' => FALSE,
                        'conditions' => array(
                            'User.id' => $values
                        ),
            ));
        }
    }
    public function getName($user = array()) {
        if ($user['User']['first_name'] && $user['User']['last_name']) {
            return $user['User']['first_name'] . ' ' . $user['User']['last_name'];
        }
        if ($user['User']['first_name']) {
            return $this->field('_name');
        }

        return null;
    }

    public function getNameOrUsername($user = array()) {
        return $this->getName($user) ? : $user['User']['username'];
    }

    public function getFirstNameOrUsername($user = array()) {
        return $user['User']['first_name'] ? : $user['User']['username'];
    }

    public function getAvatarUrl() {
        $md5 = md5($this->field('email'));
        return "https://www.gravatar.com/avatar/.$md5.?d=mm&s=40";
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        if (!empty($this->data[$this->alias]['password'])) {

            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], null, true);
        }
    }

}
