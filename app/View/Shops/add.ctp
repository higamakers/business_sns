<div class="shops form">
<?php echo $this->Form->create('Shop'); ?>
	<fieldset>
		<legend><?php echo __('店舗情報追加'); ?></legend>
	<?php
		echo $this->Form->input('shop_name',
                                array('label' => $column['shop_name']));
		echo $this->Form->input('pref_id', 
                                array('options' => $pref_list,
                                     'label' => $column['pref_id']));
        
		echo $this->Form->input('city',
                                array('label' => $column['city']));
		echo $this->Form->input('addr',
                                array('label' => $column['addr']));
		echo $this->Form->input('nearest_station',
                                array('label' => $column['nearest_station']));
		echo $this->Form->input('site_url',
                                array('label' => $column['site_url']));
		echo $this->Form->input('comment',
                                array('label' => $column['comment']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('登録')); ?>
</div>
<div class="actions">
	<?php echo $this->element('ctl_nav'); ?>
</div>
