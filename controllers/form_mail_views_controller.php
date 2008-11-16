<?php
class FormMailViewsController extends FormMailAppController {
	public $name = 'FormMailViews';
	public $uses = array('FormMail.FormMailView', 'FormMail.FormMailForm');
	public $components = array('FormMail.MyQdmail');

	function edit($id = null)
	{
		$formMailForm = $this->FormMailForm->read(null, $id);
		$elements = $this->FormMailView->setElements($formMailForm);
		$this->set(compact('formMailForm', 'elements'));

		if ($this->data) {
			$this->FormMailView->set($this->data);
			if ($this->FormMailView->validates()) {
				if ($this->_send(
					$formMailForm['FormMailForm']['email'],
					$formMailForm['FormMailForm']['title']
				)) {
					$this->Session->setFlash('送信しました');
					$this->render('send');
					return;
				} else {
					$this->Session->setFlash('送信できませんでした');
				}
			} else {
				$this->Session->setFlash('送信できませんでした メッセージを確認してください');
			}
		} else {
			$this->data['FormMailView']['id'] = $formMailForm['FormMailForm']['id'];
		}
	}

	function _send($sendTo, $title)
	{
		// data整形
		$data = $this->FormMailView->data;
		$body = array();
		foreach ($data['FormMailView'] as $key => $value) {
			if ('id' != $key) {
				$name = explode('_', $key);
				$id = $name[1];
				$label = $this->FormMailForm->FormMailElement->field(
					'label', array('id' => $id));
				if ($name[0] === 'checkbox') {
					$value = ($value) ? 'チェックあり': 'チェックなし';
				}
				$body[] = array('label' => $label, 'data' => $value);
			}
		}
		// メール送信処理
		$this->set('body', $body);
		$this->view = 'View';
		//$this->MyQdmail->debug(2);
		$this->MyQdmail->to($sendTo);
		$this->MyQdmail->subject($title);
		$this->MyQdmail->template('mail');
		return $this->MyQdmail->send();
	}
}
?>