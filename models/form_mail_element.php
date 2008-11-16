<?php
class FormMailElement extends FormMailAppModel {
	public $name = 'FormMailElement';

	public $validate = array(
		'label' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'ラベルを入力してください',
		),
	);

	public $types = array(
		'text'	   => 'テキスト',
		'textarea' => 'テキストエリア',
		'datetime' => '日付 時刻',
		'date'	   => '日付',
		'time'	   => '時刻',
		'checkbox' => 'チェックボックス',
		'radio'	   => 'ラジオボタン',
		'select'   => 'セレクトボックス',
	);

	public $rules = array(
		'numeric'	   => '半角数字',
		'alphaNumeric' => '半角英数字',
		'email'		   => 'Email形式',
		'url'		   => 'URL形式',
	);
}
?>