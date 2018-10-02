<div class="checks form">
<?php echo $this->Form->create('Check'); ?>
	<fieldset>
		<legend><?php echo __('Add Check'); ?></legend>
	<?php
		echo $this->Form->input('purpose');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('チェックする')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Checks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
