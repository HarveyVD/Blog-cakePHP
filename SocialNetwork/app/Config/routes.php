<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
/**
 * Home
 */
Router::connect('/', array('controller' => 'homes', 'action' => 'index'));
/**
 * Authentication
 */
Router::connect('/signup', array('controller' => 'auth', 'action' => 'Signup'));
Router::connect('/signin', array('controller' => 'auth', 'action' => 'Signin'));
/**
 * Search
 */
Router::connect('/search', array('controller' => 'Search', 'action' => 'Results'));
/**
 * Profile
 */
Router::connect('/user/:username', array('controller' => 'Profile', 'action' => 'Profile'),array('pass' => array('username'),'named'=>array('username')));
Router::connect('/profile/edit',array('controller'=>'Profile','action'=>'Edit'),array('pass'=>array('id')));
/**
 * Friends
 */
Router::connect('/friends', array('controller' => 'Friend', 'action' => 'index'));
Router::connect('/friends/add/:username', array('controller' => 'Friend', 'action' => 'AddFriend'),array('pass' => array('username'),'named'=> array('username')));
Router::connect('/friends/accept/:username', array('controller' => 'Friend', 'action' => 'Accept'), array('pass' => array('username'), 'named' => array('username')));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
