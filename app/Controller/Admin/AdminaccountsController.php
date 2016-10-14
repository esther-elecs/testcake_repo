<?php

App::uses('AdminAppController', 'Controller');
class AdminAccountsController extends AdminAppController {

	public $uses = array('MasterUser', 'TransactionManager', 'Group');
	// public $components = array(
	// 	'Security' => array(
	// 		'csrfExpires' => '+1 hour',
	// 		'validatePost' => false
	// 	),
	// );


	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'admin';
	}

	public function index() {
		echo $limit = (!empty($this->params->query['limit'])) ? $this->params->query['limit'] : 10;
		echo $role = (!empty($this->params->query['group_id'])) ? $this->params->query['group_id'] : 'asc';

		$name = (!empty($this->params->query['name'])) ? $this->params->query['name'] : '';
		$mail = (!empty($this->params->query['mail'])) ? $this->params->query['mail'] : '';
		$city_name = (!empty($this->params->query['city_name'])) ? $this->params->query['city_name'] : '';

		$conditions = array();
		if (!empty($mail)) {
			$conditions['MasterUser.mail LIKE'] = '%'.trim($mail).'%';
		}
		if (!empty($name)) {
			$conditions['MasterUser.name LIKE'] = '%'.trim($name).'%';
		}

		$this->paginate = array(
			'paramType' => 'querystring',
			'limit' => $limit,
			'maxLimit' => 100,
			'order' => array('id' => 'desc'),
			// 'sort' => 'group_id',
			'direction' => $role,
			'conditions' => array($conditions),
		);
		$pag = $this->paginate('MasterUser');
		$this->set(compact('pag', 'limit', 'role'));
	}

	public function add() {

		$group = $this->Group->find('list', array(
				'fields' => array('label'),
			)
		);
		$this->set('group', $group);

		if ($this->request->is(array('post', 'put'))) {

			$firstName = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['first_name']);
			$lastName = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['last_name']);

			$firstNameKana = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['first_name_kana']);
			$lastNameKana = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['last_name_kana']);

			$this->request->data['MasterUser']['name'] = $lastName.' '.$firstName;
			$this->request->data['MasterUser']['kana'] = $lastNameKana.' '.$firstNameKana;

			$this->MasterUser->validator()->remove('password_update');
			$this->MasterUser->validator()->remove('password_confirm_update');

			try {

				$transaction = $this->TransactionManager->begin();

				if (!$this->MasterUser->save($this->request->data)) {
					throw new Exception('ERROR COULD NOT CREATE MASTER USER');
				}

				$this->TransactionManager->commit($transaction);

			} catch (Exception $e) {
				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
				$this->Session->setFlash('マスターユーザーの登録に失敗しました', 'error');
				return;
			}

			$this->Session->setFlash('マスターユーザーの登録が完了しました', 'success');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function edit($id = null) {

		$group = $this->Group->find('list', array(
				'fields' => array('label'),
			)
		);
		$this->set('group', $group);

		if (!$id) {
			$this->Session->setFlash('IDを指定して下さい。', "error");
			$this->redirect(array('action' => 'detail'));
		}

		$masterUserId = $this->MasterUser->findById($id);

		if (!$masterUserId) {
			$this->Session->setFlash('親エリアIDが不正です。', "error");
			$this->redirect(array('action'=>'detail'));
		}

		// $this->MasterUser->id = $id;

		if ($this->request->is(array('post', 'put'))) {


			$firstName = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['first_name']);
			$lastName = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['last_name']);

			$firstNameKana = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['first_name_kana']);
			$lastNameKana = str_replace(array(' ', '　'), '', $this->request->data['MasterUser']['last_name_kana']);

			$this->request->data['MasterUser']['name'] = $lastName.' '.$firstName;
			$this->request->data['MasterUser']['kana'] = $lastNameKana.' '.$firstNameKana;


			if (empty($this->request->data['MasterUser']['password_update'])) {
				$this->MasterUser->validator()->remove('password_update');
				$this->MasterUser->validator()->remove('password_confirm_update');
			}

			if (!empty($this->request->data['MasterUser']['password_update'])) {
				$this->request->data['MasterUser']['password'] = $this->request->data['MasterUser']['password_update'];
			}

			try {

				$transaction = $this->TransactionManager->begin();

				$this->request->data['MasterUser']['id'] = $id;
				if (!$this->MasterUser->save($this->request->data)) {
					throw new Exception("Editing data is unable!");
				}

				$this->TransactionManager->commit($transaction);

			} catch (Exception $e) {

				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
				$this->Session->setFlash('アカウントの更新に失敗しました。', 'error');
				return;
			}

			$this->Session->setFlash('アカウントの更新が完了しました。', 'success');
			$this->redirect(array('action' => 'index'));
		}

		if (!$this->request->data) {

			list($lastName, $firstName) = explode(' ', $masterUserId['MasterUser']['name']);
			$masterUserId['MasterUser']['last_name'] = $lastName;
			$masterUserId['MasterUser']['first_name'] = $firstName;

			list($lastNameKana, $firstNameKana) = explode(' ', $masterUserId['MasterUser']['kana']);
			$masterUserId['MasterUser']['last_name_kana'] = $lastNameKana;
			$masterUserId['MasterUser']['first_name_kana'] = $firstNameKana;

			unset($masterUserId['MasterUser']['password']);

			$this->request->data = $masterUserId;
		}
	}

	public function delete($id = null) {

		if ($this->request->is(array('post', 'put'))) {

			try {

				$transaction = $this->TransactionManager->begin();

				if (empty($id)) {
					throw new Exception('ERROR MASTER USER ID NOT EXISTS');
				}

				$this->MasterUser->id = $id;
				if (!$this->MasterUser->exists()) {
					throw new Exception('ERROR MASTER USER NOT EXISTS');
				}

				if (!$this->MasterUser->save(array('MasterUser' => array('deleted' => 1, 'deleted_date' => date('Y-m-d H:i:s'))), array('validate' => false))) {
					throw new Exception('ERROR COULD NOT DELETE MASTER USER');
				}

				$this->TransactionManager->commit($transaction);

			} catch (Exception $e) {
				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
				$this->Session->setFlash('アカウントの削除に失敗しました。', 'error');
				$this->redirect(array('action' => 'index'));
			}

			$this->Session->setFlash('アカウントの削除が完了しました。', 'success');
			$this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash('不正なアクセスを検知しました', 'error');
		$this->redirect(array('action' => 'index'));

	}
}
