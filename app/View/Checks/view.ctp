<div class="checks view">
<h2><?php echo __('Check'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($check['Check']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($check['User']['id'], array('controller' => 'users', 'action' => 'view', $check['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check User Id'); ?></dt>
		<dd>
			<?php echo h($check['Check']['check_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purpose'); ?></dt>
		<dd>
			<?php echo h($check['Check']['purpose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flag'); ?></dt>
		<dd>
			<?php echo h($check['Check']['delete_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($check['Check']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($check['Check']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Check'), array('action' => 'edit', $check['Check']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Check'), array('action' => 'delete', $check['Check']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $check['Check']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Checks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
