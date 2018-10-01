<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'POST')); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('nickname');
		echo $this->Form->input('site_url');
		echo $this->Form->input('business_category_id',
                array('options' => $business_categories));
		echo $this->Form->input('business_small_category');
		echo $this->Form->input('business_pr');
		echo $this->Form->input('business_purpose_id',
                               array('options' =>$business_purposes));
        echo $this->Form->input('business_status_id',
                               array('options' =>$business_statuses));
        
		echo $this->Form->input('age_id',
                               array('options' =>$ages));
		echo $this->Form->input('pref_id',
                               array('options' =>$prefs));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Business Categories'), array('controller' => 'business_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Category'), array('controller' => 'business_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Purposes'), array('controller' => 'business_purposes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Purpose'), array('controller' => 'business_purposes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ages'), array('controller' => 'ages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age'), array('controller' => 'ages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preves'), array('controller' => 'preves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pref'), array('controller' => 'preves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
