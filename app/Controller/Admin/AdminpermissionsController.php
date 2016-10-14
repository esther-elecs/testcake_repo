<?php
App::uses('AdminAppController', 'Controller');
class AdminPermissionsController extends AdminAppController {

	public $uses = array('ArosAco', 'MasterUser', 'Group');
	public $components = array('Acl', 'AclUtility', 'OptionCommon');

	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'admin';
	}

	public function index() {

		$aclControllerName = $this->OptionCommon->aclControllerName;

		$acoConditions = array(
			'parent_id !=' => null,
			'foreign_key' => null,
			'alias !=' => null,
		);
		$acos  = $this->Acl->Aco->generateTreeList($acoConditions, '{n}.Aco.id', '{n}.Aco.alias');
		$groups = $this->Group->find('list', array('fields' => array('id', 'label')));

		$groupsAros = $this->Acl->Aro->find('all', array(
			'conditions' => array(
				'Aro.model' => 'Group',
				'Aro.foreign_key' => array_keys($groups),
				),
			));
		$groupsAros = Set::combine($groupsAros, '{n}.Aro.foreign_key', '{n}.Aro.id');

		// Get the permission list
		$permissions = array();
		foreach ($acos as $acoId => $acoAlias) {
			if (substr_count($acoAlias, '_') != 0) {
				$permission = array();
				foreach ($groups as $groupId => $groupTitle) {
					$hasAny = array(
						'aco_id'  => $acoId,
						'aro_id'  => $groupsAros[$groupId],
						'_create' => 1,
						'_read'   => 1,
						'_update' => 1,
						'_delete' => 1,
					);
					if ($this->ArosAco->hasAny($hasAny)) {
						$permission[$groupId] = 1;
					} else {
						$permission[$groupId] = 0;
					}
					$permissions[$acoId] = $permission;
				}
			}
		}

		// Get Controller
		$plugins = CakePlugin::loaded();
		$controllers_plugins = [];
		if (!empty( $plugins )) {
			foreach ($plugins as $plugin) {
				$controllers_plugins[] = $this->AclUtility->getControllerList($plugin);
			}
		}
		$controllers = array_merge($this->AclUtility->getControllerList(), $this->AclUtility->getControllerList($plugin));

		$this->set(compact('controllers', 'acos', 'groups', 'groupsAros', 'permissions', 'aclControllerName'));

	}

	public function changePermission($id = null) {

		if (!$this->request->is('ajax')) {
			$this->redirect(array('action' => 'index'));
		}

		$this->layout = false;
		$acoId = $this->request->data['aco_id'];
		$aroId = $this->request->data['aro_id'];

		// see if acoId and aroId combination exists
		$conditions = array(
			'ArosAco.aco_id' => $acoId,
			'ArosAco.aro_id' => $aroId,
		);

		if ($this->ArosAco->hasAny($conditions)) {

			$data = $this->ArosAco->find('first', array('conditions' => $conditions));
			if ($data['ArosAco']['_create'] == 1 && $data['ArosAco']['_read'] == 1 && $data['ArosAco']['_update'] == 1 && $data['ArosAco']['_delete'] == 1) {
				// from 1 to 0
				$data['ArosAco']['_create'] = 0;
				$data['ArosAco']['_read'] = 0;
				$data['ArosAco']['_update'] = 0;
				$data['ArosAco']['_delete'] = 0;
				$permitted = 0;
			} else {
				// from 0 to 1
				$data['ArosAco']['_create'] = 1;
				$data['ArosAco']['_read'] = 1;
				$data['ArosAco']['_update'] = 1;
				$data['ArosAco']['_delete'] = 1;
				$permitted = 1;
			}

		} else {

			// create - CRUD with 1
			$data['ArosAco']['aco_id'] = $acoId;
			$data['ArosAco']['aro_id'] = $aroId;
			$data['ArosAco']['_create'] = 1;
			$data['ArosAco']['_read'] = 1;
			$data['ArosAco']['_update'] = 1;
			$data['ArosAco']['_delete'] = 1;
			$permitted = 1;

		}

		// save
		$success = 0;
		if ($this->ArosAco->save($data)) {
			$success = 1;
		}
		$this->set(compact('success'));

	}

}