<div class="formMailElements form">
<?php echo $form->create('FormMailElement');?>
	<fieldset>
		<legend>新しい項目</legend>
	<?php
		echo $form->input('form_mail_form_id', array('type' => 'hidden'));
		echo $form->input('label', array('label' => 'ラベル'));
		echo $form->input('type', array('label' => 'タイプ', 'options' => $types));
		echo $form->input('options', array('label' => 'オプション', 
			'after' => 'カンマ区切りで入力してください。ラジオボタン・セレクトボックスのときのみ有効です。'));
		echo $form->input('rule', array('label' => 'ルール', 'options' => $rules, 'empty' => true));
		echo $form->input('required', array('label' => '必須'));
	?>
	</fieldset>
<?php echo $form->end('保存');?>
</div>
