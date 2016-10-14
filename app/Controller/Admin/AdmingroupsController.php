<?php

App::uses('AdminAppController', 'Controller');
class AdminGroupsController extends AdminAppController {

	public $uses = array('Group', 'TransactionManager');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'admin';
		$this->Auth->allowedActions = array('*');
	}

	public function add() {


		if ($this->request->is(array('post', 'put'))) {


			try {

				$transaction = $this->TransactionManager->begin();

				if (!$this->Group->save($this->request->data)) {
					throw new Exception('ERROR COULD NOT CREATE GROUP');
				}

				$this->TransactionManager->commit($transaction);

			} catch (Exception $e) {
				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
				$this->Session->setFlash('グールプの登録に失敗しました。', 'error');
				return;
			}

			$this->Session->setFlash('グールプの登録が完了しました。', 'success');
			$this->redirect(array('action' => 'add'));
		}
	}

}