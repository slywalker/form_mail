<?php
class FormMailForm extends FormMailAppModel {
	public $name = 'FormMailForm';
	public $validate = array(
		'title' => array(
			array(
				'rule' => VALID_NOT_EMPTY,
				'message' => 'タイトルを入力してください',
			),
		),
		'email' => array(
			array(
				'rule' => array('email'),
				'message' => 'メールアドレスの形式を確認してください',
			),
			array(
				'rule' => VALID_NOT_EMPTY,
				'message' => 'メールアドレスを入力してください',
			),
		),
	);

	public $hasMany = array(
		'FormMailElement' => array(
			'className' => 'FormMail.FormMailElement',
			'dependent' => true,
		)
	);
}
?>