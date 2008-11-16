<div class="formMailForms form">
<?php echo $form->create('FormMailForm');?>
	<fieldset>
		<legend>フォームの編集</legend>
	<?php
		echo $form->input('id');
		echo $form->input('title', array('label' => 'タイトル'));
		echo $form->input('email', array('label' => '送信先'));
	?>
	</fieldset>
<?php echo $form->end('保存');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('削除', array('action'=>'delete', $form->value('FormMailForm.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FormMailForm.id'))); ?></li>
		<li><?php echo $html->link('フォームの一覧', array('action'=>'index'));?></li>
	</ul>
</div>
