<div class="formMailForms view">
<h2>フォームの詳細</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formMailForm['FormMailForm']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>タイトル</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formMailForm['FormMailForm']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>送信先</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formMailForm['FormMailForm']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('フォームの編集', array('action'=>'edit', $formMailForm['FormMailForm']['id'])); ?> </li>
		<li><?php echo $html->link('フォームの一覧', array('action'=>'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>フォームの項目</h3>
	<?php if (!empty($formMailForm['FormMailElement'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th>ラベル</th>
		<th>タイプ</th>
		<th>オプション</th>
		<th>ルール</th>
		<th>必須</th>
		<th class="actions">繰作</th>
	</tr>
	<?php
		$i = 0;
		foreach ($formMailForm['FormMailElement'] as $formMailElement):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $formMailElement['id'];?></td>
			<td><?php echo $formMailElement['label'];?></td>
			<td><?php echo $types[$formMailElement['type']];?></td>
			<td><?php echo $formMailElement['options'];?></td>
			<td>
				<?php echo ($formMailElement['rule'])
					? $rules[$formMailElement['rule']]: '';?>
			</td>
			<td>
				<?php echo ($formMailElement['required']) ? '必須': '';?>
			</td>
			<td class="actions">
				<?php echo $html->link('編集', array('controller'=> 'form_mail_elements', 'action'=>'edit', $formMailElement['id'])); ?>
				<?php echo $html->link('削除', array('controller'=> 'form_mail_elements', 'action'=>'delete', $formMailElement['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formMailElement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link('新しい項目', array('controller'=> 'form_mail_elements', 'action'=>'add', 'form' => $formMailForm['FormMailForm']['id']));?> </li>
		</ul>
	</div>
</div>
