<div class="boards form">
<?php echo $this->Form->create('Board'); ?>
	<fieldset>
		<legend><?php echo __('Edit Board'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('business_purpose_id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('app_flag');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Board.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Board.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Boards'), array('action' => 'index')); ?></li>
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
