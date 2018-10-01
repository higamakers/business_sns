<div class="entries view">
<h2><?php echo __('Entry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entry['Entry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Party'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entry['Party']['title'], array('controller' => 'parties', 'action' => 'view', $entry['Party']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entry['User']['id'], array('controller' => 'users', 'action' => 'view', $entry['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($entry['Entry']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flag'); ?></dt>
		<dd>
			<?php echo h($entry['Entry']['delete_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($entry['Entry']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($entry['Entry']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entry'), array('action' => 'edit', $entry['Entry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entry'), array('action' => 'delete', $entry['Entry']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $entry['Entry']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parties'), array('controller' => 'parties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Party'), array('controller' => 'parties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
