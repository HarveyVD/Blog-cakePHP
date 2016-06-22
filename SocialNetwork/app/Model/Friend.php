<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Friend extends AppModel {
    public $actsAs = array('Containable');
    public $useTable = 'friends'; // Sử dụng table users
}
