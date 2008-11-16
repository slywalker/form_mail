<?php
class FormMailElementsController extends FormMailAppController {
	public $name = 'FormMailElements';

	function admin_add()
	{
		if (!empty($this->data)) {
			$this->FormMailElement->create();
			if ($this->FormMailElement->save($this->data)) {
				$this->Session->setFlash('項目を保存しました');
				$this->redirect(array(
					'controller' => 'form_mail_forms',
					'action' => 'view',
					$this->data['FormMailElement']['form_mail_form_id'],
				));
			} else {
				$this->Session->setFlash('項目を保存できませんでした。再度入力してください。');
			}
		} else {
			if (!empty($this->params['named']['form'])) {
				$this->data['FormMailElement']['form_mail_form_id']
					= $this->params['named']['form'];
			} else {
				$this->Session->setFlash('無効なIDです');
				$this->redirect(array(
					'controller' => 'form_mail_forms',
					'action' => 'index'
				));
			}
		}
		$types = $this->FormMailElement->types;
		$rules = $this->FormMailElement->rules;
		$this->set(compact('types', 'rules'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('無効なIDです');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FormMailElement->save($this->data)) {
				$this->Session->setFlash('項目を保存しました');
				$this->redirect(array(
					'controller' => 'form_mail_forms',
					'action' => 'view',
					$this->data['FormMailElement']['form_mail_form_id'],
				));
			} else {
				$this->Session->setFlash('項目を保存できませんでした。再度入力してください。');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FormMailElement->read(null, $id);
		}
		$types = $this->FormMailElement->types;
		$rules = $this->FormMailElement->rules;
		$this->set(compact('types', 'rules'));
	}

	function admin_delete($id = null)
	{
		if (!$id) {
			$this->Session->setFlash('無効なIDです');
			$this->redirect(array(
				'controller' => 'form_mail_forms',
				'action' => 'index'
			));
		}
		$form_id = $this->FormMailElement->field('form_mail_form_id', array('id' => $id));
		if ($this->FormMailElement->del($id)) {
			$this->Session->setFlash('項目を削除しました');
			$this->redirect(array(
				'controller' => 'form_mail_forms',
				'action' => 'view',
				$form_id,
			));
		}
	}

}
?>