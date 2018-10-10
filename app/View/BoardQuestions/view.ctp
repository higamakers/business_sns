<div class="boardQuestions view">
<h2><?php echo __('Board Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($boardQuestion['BoardQuestion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Board'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardQuestion['Board']['title'], array('controller' => 'boards', 'action' => 'view', $boardQuestion['Board']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardQuestion['User']['id'], array('controller' => 'users', 'action' => 'view', $boardQuestion['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($boardQuestion['BoardQuestion']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($boardQuestion['BoardQuestion']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($boardQuestion['BoardQuestion']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Board Question'), array('action' => 'edit', $boardQuestion['BoardQuestion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Board Question'), array('action' => 'delete', $boardQuestion['BoardQuestion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $boardQuestion['BoardQuestion']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boards'), array('controller' => 'boards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('controller' => 'boards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
