<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
        <dt><?php echo __('Thumbnail'); ?></dt>
		<dd>
			<?php echo $this->Profile->thumb80($other_user['User']['thumbnail_url']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($other_user['User']['nickname']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('My Page'), array('action' => 'mypage')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entries'); ?></h3>
	<?php if (!empty($user['Entry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Party Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Entry'] as $entry): ?>
		<tr>
			<td><?php echo $entry['id']; ?></td>
			<td><?php echo $entry['party_id']; ?></td>
			<td><?php echo $entry['user_id']; ?></td>
			<td><?php echo $entry['created_at']; ?></td>
			<td><?php echo $entry['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entries', 'action' => 'view', $entry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entries', 'action' => 'edit', $entry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entries', 'action' => 'delete', $entry['id']), array('confirm' => __('Are you sure you want to delete # %s?', $entry['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
