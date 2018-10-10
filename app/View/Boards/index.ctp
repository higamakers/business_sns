<div class="boards index">
	<h2><?php echo __('Boards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('business_purpose_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('app_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($boards as $board): ?>
	<tr>
		<td><?php echo h($board['Board']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($board['User']['id'], array('controller' => 'users', 'action' => 'view', $board['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($board['BusinessPurpose']['id'], array('controller' => 'business_purposes', 'action' => 'view', $board['BusinessPurpose']['id'])); ?>
		</td>
		<td><?php echo h($board['Board']['title']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['content']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['app_flag']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $board['Board']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $board['Board']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $board['Board']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $board['Board']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Board'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Search Board'), array('action' => 'search')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Purposes'), array('controller' => 'business_purposes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Purpose'), array('controller' => 'business_purposes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Comments'), array('controller' => 'board_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Comment'), array('controller' => 'board_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Images'), array('controller' => 'board_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Image'), array('controller' => 'board_images', 'action' => 'add')); ?> </li>
	</ul>
</div>
