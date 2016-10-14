<?php

App::uses('AdminAppController', 'Controller');
class AdminUsersController extends AdminAppController {

	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'login';
	}

	public function login() {

		if ($this->Session->check('Auth.admins')) {
			$this->redirect(array('controller' => 'adminaccounts', 'action' => 'index'));
		}

		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('メールアドレスもしくはパスワードに誤りがあります');
			}

		}
		$this->set('title', '保育士管理データベース / アドミン');
	}

	public function logout() {
		// $this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
}
