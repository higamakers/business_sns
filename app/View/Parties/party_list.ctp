<div class="parties index">
	<h2><?php echo __('Parties'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th>event_day</th>
			<th>event_time</th>
			
			<th><?php echo $this->Paginator->sort('shop_id'); ?></th>
			<th class="actions">詳細</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parties as $party): ?>
	<tr>
		<td><?php echo h($party['Party']['title']); ?>&nbsp;</td>
		<td><?php echo $this->Party->event_day($party); ?>&nbsp;</td>
		<td><?php echo $this->Party->event_time($party); ?>&nbsp;</td>
		<td>
			<?php echo $shop_list[$party['Party']['shop_id']]; ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'party_detail', $party['Party']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Party'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Search Party'), array('action' => 'search')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
