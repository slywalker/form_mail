<?php
class FormMailFormsController extends FormMailAppController {
	public $name = 'FormMailForms';

	function admin_index()
	{
		$this->FormMailForm->recursive = 0;
		$this->set('formMailForms', $this->paginate());
	}

	function admin_view($id = null)
	{
		if (!$id) {
			$this->flash('無効なIDです', array('action' => 'index'));
		}
		$this->set('formMailForm', $this->FormMailForm->read(null, $id));

		$types = $this->FormMailForm->FormMailElement->types;
		$rules = $this->FormMailForm->FormMailElement->rules;
		$this->set(compact('types', 'rules'));
	}

	function admin_add()
	{
		if (!empty($this->data)) {
			$this->FormMailForm->create();
			if ($this->FormMailForm->save($this->data)) {
				$this->flash('フォームを保存しました', array('action' => 'index'));
			} else {
			}
		}
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data)) {
			$this->flash('無効なIDです', array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FormMailForm->save($this->data)) {
				$this->flash('フォームを保存しました', array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FormMailForm->read(null, $id);
		}
	}

	function admin_delete($id = null)
	{
		if (!$id) {
			$this->flash('無効なIDです', array('action' => 'index'));
		}
		if ($this->FormMailForm->del($id)) {
			$this->flash('フォームを削除しました', array('action' => 'index'));
		}
	}
}
?>