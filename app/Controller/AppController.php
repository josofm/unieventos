<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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

	public $components = array('Session', 'Auth',);
	
	public function isPrefix($prefix){
		return isset($this->request->params['prefix']) && $this->request->params['prefix'] == $prefix;
	}
 
	public function beforeFilter(){
		if($this->isPrefix('admin')){
			$this->layout = 'admin';
		}else{
			$this->Auth->allow();
		}

		$this->Auth->authenticate = array('Form' => array(
			'userModel' => 'Usuario',
			'fields' => array(
				'username' => 'email',
				'password' => 'senha'
				)
			));
		$this->Auth->loginAction = array(
			'controller' => 'usuarios',
			'action' => 'login',
			'admin' => false
			);
		$this->Auth->logoutAction = array('controller' => 'pages', 'action' => 'display', 'home');
		/*$this->loadModel('Usuario');
		$this->Usuario->save(array(
			'nome' => 'admin',
			'email' => 'admin@localhost.com',
			'senha' => 'admin'
			));
		*/
		$this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
		parent::beforeFilter();
		$this->Session->write('Config.language','por');
		//$this->Session->write('Config.language','eng');
	}
}
