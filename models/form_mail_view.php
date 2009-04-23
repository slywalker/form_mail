<?php
class FormMailView	extends FormMailAppModel {
	public $name = 'FormMailView';
	public $useTable = false;

	public $_schema = array('id' => array('type' => 'primary'));
	public $validate = array();

	function setElements($formMailForm)
	{
		$elements = array();
		foreach ($formMailForm['FormMailElement'] as $key => $element) {
			$name = $element['type'] . '_' . $element['id'];
			// elements
			$elements[$key]['name'] = $name;
			$elements[$key]['options'] = $this->setFormOptions($element);
			// schema
			$this->setSchema($name, $element['type']);
			// validate
			if ($element['rule']) {
				$allowEmpty = true;
				if ($element['required']) {
					$allowEmpty = false;
				}
				$this->setValidate($name, $element['rule'], $allowEmpty);
			}
			if ($element['required']) {
				$this->setValidate($name);
				if ($element['type'] === 'checkbox') {
					$this->setValidate($name, 'checked');
				}
			}
		}
		
		return $elements;
	}

	function setSchema($name, $type)
	{
		$map = array(
			'text'	   => 'string',
			'textarea' => 'text',
			'datetime' => 'datetime',
			'date'	   => 'date',
			'time'	   => 'time',
			'select'   => 'string',
			'radio'	   => 'string',
			'checkbox' => 'boolean',
		);
		$schema = array($name => array('type' => $map[$type]));
		$this->_schema = am($this->_schema, $schema);
		return $this->_schema;
	}

	function setValidate($field, $options = 'required', $allowEmpty = false)
	{
		$rule = $options;
		if (is_array($options)) {
			$rule = $options[0];
		}
		$validate = array();
		if ($allowEmpty) {
			$validate['allowEmpty'] = true;
		}
		switch ($rule) {
			case 'required':
				$validate['rule'] = array('notEmpty');
				$validate['message'] = '必須項目です';
				break;
			case 'checked':
				$validate['rule'] = array('comparison', '>', 0);
				$validate['message'] = '必須項目です';
				break;
			case 'numeric':
				$validate['rule'] = $options;
				$validate['message'] = '半角数字で入力してください';
				break;
			case 'alphaNumeric':
				$validate['rule'] = $options;
				$validate['message'] = '半角英数字で入力してください';
				break;
			case 'email':
				$validate['rule'] = $options;
				$validate['message'] = 'メールアドレスの形式を確認してください';
				break;
			case 'url':
				$validate['rule'] = $options;
				$validate['message'] = 'URLの形式を確認してください';
				break;
		}

		$this->validate[$field][] = $validate;
		return $this->validate;
	}

	function setFormOptions($element)
	{
		$default_element = array(
			'label'	  => false,
			'type'	  => 'text',
			'options' => null,
		);
		$element = am($default_element, $element);

		$options = array();
		$options['label'] = h($element['label']);
		$options['type'] = $element['type'];

		switch ($element['type']) {
			case 'datetime':
				$options['dateFormat'] = 'YMD';
				$options['monthNames'] = false;
				$options['timeFormat'] = '24';
				$options['interval']   = 10;
				break;
			case 'date':
				$options['dateFormat'] = 'YMD';
				$options['monthNames'] = false;
				break;
			case 'time':
				$options['dateFormat'] = 'NONE';
				$options['timeFormat'] = '24';
				$options['interval']   = 10;
				break;
			case 'select':
				$opt = explode(',', $element['options']);
				$options['options'] = array_combine($opt, $opt);
				break;
			case 'radio':
				$opt = explode(',', $element['options']);
				$options['options'] = array_combine($opt, $opt);
				$options['legend'] = h($element['label']);
				break;
			case 'checkbox':
				break;
		}
		return $options;
	}
}
?>