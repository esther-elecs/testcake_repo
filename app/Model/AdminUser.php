<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class AdminUser extends AppModel {

	public $validate = array(
		'mail' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'メールアドレスが入力されていません',
			),
			'mail' => array(
				'rule' => array('email'),
				'message' => 'メールアドレスを入力してください',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => '255文字以内で入力してください',
			),
			'custom' => array(
				'rule' => array('checkEmail'),
				'message' => 'メールアドレスを入力してください',
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => '同じメールが既に存在しています'
			)
		),
		'password' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'allowEmpty' => true,
				'message' => '半角英数字のみ入力可能です',
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => '6文字以上で入力してください',
			),
		),
		'password_confirm' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'allowEmpty' => true,
				'message' => '半角英数字のみ入力可能です',
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => '6文字以上で入力してください',
			),
			'sameCheck' => array(
				'rule' => array('sameCheck', 'password'),
				'message' => '確認用パスワードが一致しません',
			),
		),
		'password_update' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => '確認用パスワードが入力されていません',
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => '半角英数字のみ入力可能です',
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => '6文字以上で入力してください',
			),
		),
		'password_confirm_update' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => '確認用パスワードが入力されていません',
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => '半角英数字のみ入力可能です',
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => '6文字以上で入力してください',
			),
			'sameCheck' => array(
				'rule' => array('sameCheck', 'password_update'),
				'message' => '確認用パスワードが一致しません',
			)
		),
	);

	public function checkEmail($check) {
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];

		return preg_match('/^[a-zA-Z0-9_\-@.]*$/', $value);
	}

	public function sameCheck($value , $field_name) {
		$v1 = array_shift($value);
		$v2 = $this->data[$this->name][$field_name];
		return $v1 == $v2;
	}

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

}