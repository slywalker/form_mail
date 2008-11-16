<div class="formMailForms form">
<?php echo $form->create('FormMailForm');?>
	<fieldset>
		<legend>新しいフォーム</legend>
	<?php
		echo $form->input('title', array('label' => 'タイトル'));
		echo $form->input('email', array('label' => '送信先'));
	?>
	</fieldset>
<?php echo $form->end('保存');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('フォームの一覧', array('action'=>'index'));?></li>
	</ul>
</div>
