
<h2><?php echo __('Parties'); ?></h2>
<div class="parties form">
<?php echo $this->Form->create('Party'); ?>
	<fieldset>
		<legend><?php echo __('Search Party'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('year');
		echo $this->Form->input('month');
		echo $this->Form->input('day');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('shop_id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('price');
		echo $this->Form->input('end_flag');
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
		<li><?php echo $this->Html->link(__('New Party'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
	</ul>
</div>




<div class="parties index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('month'); ?></th>
			<th><?php echo $this->Paginator->sort('day'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('shop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('end_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parties as $party): ?>
	<tr>
		<td><?php echo h($party['Party']['id']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['year']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['month']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['day']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['end_time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($party['Shop']['id'], array('controller' => 'shops', 'action' => 'view', $party['Shop']['id'])); ?>
		</td>
		<td><?php echo h($party['Party']['title']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['content']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['price']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['end_flag']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $party['Party']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $party['Party']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $party['Party']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $party['Party']['id']))); ?>
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