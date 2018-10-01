<div class="parties form">
<?php echo $this->Form->create('Party', array('type' => 'post')); ?>
	<fieldset>
		<legend><?php echo __('edit Party'); ?></legend>
	<?php
		echo $this->Form->input('year');
		echo $this->Form->input('month', 
                                array('options' => $month_list));
		echo $this->Form->input('day', 
                                array('options' => $day_list));
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('shop_id', 
                                array('options' => $shop_list));
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('price');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Parties'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
