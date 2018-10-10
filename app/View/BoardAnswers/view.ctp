<div class="boardAnswers view">
<h2><?php echo __('Board Answer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($boardAnswer['BoardAnswer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Board'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardAnswer['Board']['title'], array('controller' => 'boards', 'action' => 'view', $boardAnswer['Board']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Board Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardAnswer['BoardQuestion']['id'], array('controller' => 'board_questions', 'action' => 'view', $boardAnswer['BoardQuestion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardAnswer['PostUser']['id'], array('controller' => 'users', 'action' => 'view', $boardAnswer['PostUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardAnswer['User']['id'], array('controller' => 'users', 'action' => 'view', $boardAnswer['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($boardAnswer['BoardAnswer']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($boardAnswer['BoardAnswer']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($boardAnswer['BoardAnswer']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Board Answer'), array('action' => 'edit', $boardAnswer['BoardAnswer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Board Answer'), array('action' => 'delete', $boardAnswer['BoardAnswer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $boardAnswer['BoardAnswer']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Answers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boards'), array('controller' => 'boards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('controller' => 'boards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Questions'), array('controller' => 'board_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Question'), array('controller' => 'board_questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
