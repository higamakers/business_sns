<div class="shops index">
	<h2><?php echo __('店舗情報一覧'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', $column['id']); ?></th>
			<th><?php echo $this->Paginator->sort('shop_name', $column['shop_name']); ?></th>
			<th><?php echo $this->Paginator->sort('pref_id', $column['pref_id']); ?></th>
			<th><?php echo $this->Paginator->sort('city', $column['city']); ?></th>
			<th><?php echo $this->Paginator->sort('addr', $column['addr']); ?></th>
			<th><?php echo $this->Paginator->sort('nearest_station', $column['nearest_station']); ?></th>
			<th><?php echo $this->Paginator->sort('site_url', $column['site_url']); ?></th>
			<th><?php echo $this->Paginator->sort('comment', $column['comment']); ?></th>
			<th><?php echo $this->Paginator->sort('created_at', $column['created_at']); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at', $column['updated_at']); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
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
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $shop['Shop']['id'])); ?>
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $shop['Shop']['id'])); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $shop['Shop']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shop['Shop']['id']))); ?>
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
	<?php echo $this->element('ctl_nav'); ?>
</div>
