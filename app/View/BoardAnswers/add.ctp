<div class="boardAnswers form">
<?php echo $this->Form->create('BoardAnswer'); ?>
	<fieldset>
		<legend><?php echo __('Add Board Answer'); ?></legend>
	<?php
		echo $this->Form->input('board_id');
		echo $this->Form->input('board_question_id');
		echo $this->Form->input('post_user_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Board Answers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Boards'), array('controller' => 'boards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('controller' => 'boards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Questions'), array('controller' => 'board_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Question'), array('controller' => 'board_questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
