<div class="formMailForms index">
<h2>フォームの一覧</h2>
<p>
<?php
echo $myPaginator->counter();
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $myPaginator->sort('Id', 'id');?></th>
	<th><?php echo $myPaginator->sort('タイトル', 'title');?></th>
	<th><?php echo $myPaginator->sort('送信先', 'email');?></th>
	<th class="actions">繰作</th>
</tr>
<?php
$i = 0;
foreach ($formMailForms as $formMailForm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $formMailForm['FormMailForm']['id']; ?>
		</td>
		<td>
			<?php echo $formMailForm['FormMailForm']['title']; ?>
		</td>
		<td>
			<?php echo $formMailForm['FormMailForm']['email']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('フォーム表示', array('controller'=>'form_mail_views', 'action'=>'edit', 'admin'=>false, $formMailForm['FormMailForm']['id'])); ?>
			<?php echo $html->link('詳細', array('action'=>'view', $formMailForm['FormMailForm']['id'])); ?>
			<?php echo $html->link('編集', array('action'=>'edit', $formMailForm['FormMailForm']['id'])); ?>
			<?php echo $html->link('削除', array('action'=>'delete', $formMailForm['FormMailForm']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formMailForm['FormMailForm']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $myPaginator->pages();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('新しいフォーム', array('action'=>'add')); ?></li>
	</ul>
</div>
