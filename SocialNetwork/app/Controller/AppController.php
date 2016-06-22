<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // Cake có tính kế thừa, nếu định nghĩa cấu hình các $components trong AppController thì các Controller kế thừa nó
    // sẽ tự động được dùng và kế thừa các cấu hình này mà không cần khai báo nữa
    // với trường hợp vừa nãy, do em không hiểu tính kế thừa này trong cake, nên định nghĩa lại
    // $components này trong AuthController, do vậy các cấu hình trong Auth trong controller này bị ghi đè lại
    // nên nó không còn đúng nữa
    var $uses = array('User');
    public $components = array(
        'Session',
        'Flash',
        'DebugKit.Toolbar',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'auth',
                'action' => 'Signin'
            ),
            'loginRedirect' => array('controller' => 'homes', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'homes',
                'action' => 'index',
                
            ),
            'authenticate' => array(               
                'Form' => array(
                    'userModel' => 'User',                    
                    'fields' => array('username' => 'email','password' => 'password')
                )
            )
        ),        
    );        
    public function beforeFilter() { 
        $getname['User'] = $this->Auth->user();
        $this->set('getname', $this->User->getNameOrUsername($getname));
        
        $this->set('avataUrl', $this->User->getAvatarUrl());
        $this->Auth->loginAction = array('controller'=>'auth','action'=>'Signin');
        $this->Auth->allow('index');
    }
}
