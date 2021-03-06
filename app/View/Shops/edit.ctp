<div class="shops form">
<?php echo $this->Form->create('Shop', array('type' => 'post')); ?>
	<fieldset>
		<legend><?php echo __('Edit Shop'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('shop_name');
		echo $this->Form->input('pref_id', array('options' => $pref_list));
		echo $this->Form->input('city');
		echo $this->Form->input('addr');
		echo $this->Form->input('nearest_station');
		echo $this->Form->input('site_url');
		echo $this->Form->input('comment');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Shop.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Shop.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Preves'), array('controller' => 'preves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pref'), array('controller' => 'preves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parties'), array('controller' => 'parties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Party'), array('controller' => 'parties', 'action' => 'add')); ?> </li>
	</ul>
</div>
