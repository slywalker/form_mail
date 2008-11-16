<h2><?php echo h($formMailForm['FormMailForm']['title']); ?></h2>
<?php echo $form->create('FormMailView'); ?>
	<?php
	echo $form->input('id');
	foreach ($elements as $key => $element) {
		echo $form->input($element['name'], $element['options']);
	}
	?>
<?php echo $form->end('送信'); ?>

