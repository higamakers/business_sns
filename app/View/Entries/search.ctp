
<h2><?php echo __('Entries'); ?></h2>
<div class="entries form">
<?php echo $this->Form->create('Entry'); ?>
	<fieldset>
		<legend><?php echo __('Search Entry'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('party_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment');
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
		<li><?php echo $this->Html->link(__('New Entry'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parties'), array('controller' => 'parties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Party'), array('controller' => 'parties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>




<div class="entries index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('party_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entries as $entry): ?>
	<tr>
		<td><?php echo h($entry['Entry']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entry['Party']['title'], array('controller' => 'parties', 'action' => 'view', $entry['Party']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entry['User']['id'], array('controller' => 'users', 'action' => 'view', $entry['User']['id'])); ?>
		</td>
		<td><?php echo h($entry['Entry']['comment']); ?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['delete_flag']); ?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entry['Entry']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entry['Entry']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entry['Entry']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $entry['Entry']['id']))); ?>
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