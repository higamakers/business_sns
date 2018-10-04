<div class="shops form">
<?php echo $this->Form->create('Shop', array('type' => 'post')); ?>
	<fieldset>
		<legend><?php echo __('店舗情報更新'); ?></legend>
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
	<?php echo $this->element('ctl_nav'); ?>
</div>
