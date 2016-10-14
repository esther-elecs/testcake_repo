<?php

App::uses('AdminAppController', 'Controller');
class AdminProfilesController extends AdminAppController {

	public $uses = array('AdminUser', 'TransactionManager');

	public function edit() {

		$id = $this->Auth->user('id');
		if (empty($id)) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('controller' => 'adminprofiles', 'action' => 'index'));
		}

		$adminUser = $this->AdminUser->findById($id);
		if (!$adminUser) {
			$this->Session->setFlash('Please provide a valid id');
			$this->redirect(array('controller' => 'adminaccounts', 'action' => 'index'));
		}

		if ($this->request->is(array('post', 'put'))) {

			if (empty($this->request->data['AdminUser']['password_update'])) {
				$this->AdminUser->validator()->remove('password_update');
				$this->AdminUser->validator()->remove('password_confirm_update');
			}

			if (!empty($this->request->data['AdminUser']['password_update'])) {
				$this->request->data['AdminUser']['password'] = $this->request->data['AdminUser']['password_update'];
			}

			try {
				$transaction = $this->TransactionManager->begin();

				$this->AdminUser->id = $id;
				$this->AdminUser->set($this->request->data);
				if (!$this->AdminUser->save($this->request->data)) {
					throw new Exception('ERROR COULD NOT UPDATE ADMIN USER');
				}

				$loginUser = $this->Session->read('Auth.admins');
				$loginUser['name'] = $this->request->data['AdminUser']['name'];
				$this->Session->write('Auth.admins', $loginUser);

				$this->TransactionManager->commit($transaction);
			} catch (Exception $e) {
				$this->log('File : '.$e->getFile().'Line : '.$e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
				$this->Session->setFlash('アドミンアカウントの編集に失敗した。', 'error');
				return;
			}

			$this->Session->setFlash('アドミンアカウントの編集が完了しました。', 'success');
			$this->redirect(array('controller' => 'adminaccounts', 'action' => 'index'));
		}

		if (!$this->request->data) {
			unset($adminUser['AdminUser']['password']);
			$this->request->data = $adminUser;
		}
	}
}