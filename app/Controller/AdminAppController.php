<?php

class AdminAppController extends AppController {

	protected $_mergeParent = 'AdminAppController';

	public $components = array(
		'Session',
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'adminusers',
				'action' => 'login'
			),
			'loginRedirect' => array(
				'controller' => 'adminaccounts',
				'action' => 'index'
			),
			'logoutRedirect' => array(
				'controller' => 'adminusers',
				'action' => 'login'
			),
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'mail',
						'password' => 'password'
					),
					'userModel' => 'AdminUser',
					'passwordHasher' => 'Blowfish'
				)
			),
			'authorize' => array(
				'Controller',
			)
		)
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'admin';
		AuthComponent::$sessionKey = 'Auth.admins';
	}

	public function isAuthorized($user) {
		if ($this->Auth->loggedIn() && $this->Session->check('Auth.admins')) {
			return true;
		}
		return false;
	}
}
