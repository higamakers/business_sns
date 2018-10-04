<div class="parties form">
<?php echo $this->Form->create('Party', array('type' => 'post')); ?>
	<fieldset>
		<legend><?php echo __('交流会編集'); ?></legend>
	<?php
		echo $this->Form->input('year',
                               array('label' => $column['year']));
        
		echo $this->Form->input('month', 
                                array('options' => $month_list,
                                     'label' => $column['month']));
        
		echo $this->Form->input('day', 
                                array('options' => $day_list,
                                     'label' => $column['day']));
		echo $this->Form->input('start_time',
                               array('label' => $column['start_time']));
		echo $this->Form->input('end_time',
                               array('label' => $column['end_time']));
		echo $this->Form->input('shop_id', 
                                array('options' => $shop_list,
                                     'label' => $column['shop_id']));
        
		echo $this->Form->input('title',
                               array('label' => $column['title']));
        
		echo $this->Form->input('content',
                               array('label' => $column['content']));
        
		echo $this->Form->input('price',
                               array('label' => $column['price']));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('更新')); ?>
</div>
<div class="actions">
	<?php echo $this->element('ctl_nav'); ?>
</div>
