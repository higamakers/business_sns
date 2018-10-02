
<h2><?php echo __('Checks'); ?></h2>
<div class="checks form">
<?php echo $this->Form->create('Check'); ?>
	<fieldset>
		<legend><?php echo __('Search Check'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('check_user_id');
		echo $this->Form->input('purpose');
		echo $this->Form->input('delete_flag');
	?>
	</fieldset>
    
<div class="button">    
    
<?php
		echo $this->Form->button('search',
                array('type' => 'submit',
				      'name' => 'search'));
	?>
&nbsp;<?php
		echo $this->Form->button('clear',
                array('type' => 'submit',
				      'name' => 'clear'));
echo $this->Form->end(); ?>
    
    </div>    
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Check'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>




<div class="checks index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('check_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('purpose'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($checks as $check): ?>
	<tr>
		<td><?php echo h($check['Check']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($check['User']['id'], array('controller' => 'users', 'action' => 'view', $check['User']['id'])); ?>
		</td>
		<td><?php echo h($check['Check']['check_user_id']); ?>&nbsp;</td>
		<td><?php echo h($check['Check']['purpose']); ?>&nbsp;</td>
		<td><?php echo h($check['Check']['delete_flag']); ?>&nbsp;</td>
		<td><?php echo h($check['Check']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($check['Check']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $check['Check']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $check['Check']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $check['Check']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $check['Check']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
    <?php
	$this->Paginator->options(array('url' => $searchword)); 
	?>
            
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>