<div class="shops index">
	<h2><?php echo __('Shops'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('shop_name'); ?></th>
			<th><?php echo $this->Paginator->sort('pref_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('addr'); ?></th>
			<th><?php echo $this->Paginator->sort('nearest_station'); ?></th>
			<th><?php echo $this->Paginator->sort('site_url'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($shops as $shop): ?>
	<tr>
		<td><?php echo h($shop['Shop']['id']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['shop_name']); ?>&nbsp;</td>
		<td>
			<?php echo h($pref_list[$shop['Shop']['pref_id']]); ?>
		</td>
		<td><?php echo h($shop['Shop']['city']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['addr']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['nearest_station']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['site_url']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['comment']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($shop['Shop']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shop['Shop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shop['Shop']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shop['Shop']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shop['Shop']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Shop'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Search Shop'), array('action' => 'search')); ?></li>
		<li><?php echo $this->Html->link(__('List Preves'), array('controller' => 'preves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pref'), array('controller' => 'preves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parties'), array('controller' => 'parties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Party'), array('controller' => 'parties', 'action' => 'add')); ?> </li>
	</ul>
</div>
