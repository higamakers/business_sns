<div class="entries form">
<dl>
    <dt>タイトル</dt>
		<dd>
			<?php echo h($party['Party']['title']); ?>
			&nbsp;
		</dd>
		<dt>開催日</dt>
		<dd>
			<?php echo $this->Party->event_day($party); ?>
			&nbsp;
		</dd>
		<dt>開催時間</dt>
		<dd>
			<?php echo $this->Party->event_time($party); ?>
			&nbsp;
		</dd>
    
    
</dl>    
<?php echo $this->Form->create('Entry'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parties'), array('controller' => 'parties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Party'), array('controller' => 'parties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
