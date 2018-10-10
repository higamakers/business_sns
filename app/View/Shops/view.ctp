<div class="shops view">
<h2><?php echo __('Shop'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop Name'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['shop_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pref'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shop['Pref']['id'], array('controller' => 'preves', 'action' => 'view', $shop['Pref']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addr'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['addr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nearest Station'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['nearest_station']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Url'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['site_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
		<?php echo $this->element('ctl_nav'); ?>
</div>
<div class="related">
	<h3><?php echo __('Related Parties'); ?></h3>
	<?php if (!empty($shop['Party'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Month'); ?></th>
		<th><?php echo __('Day'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Shop Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($shop['Party'] as $party): ?>
		<tr>
			<td><?php echo $party['id']; ?></td>
			<td><?php echo $party['year']; ?></td>
			<td><?php echo $party['month']; ?></td>
			<td><?php echo $party['day']; ?></td>
			<td><?php echo $party['start_time']; ?></td>
			<td><?php echo $party['end_time']; ?></td>
			<td><?php echo $party['shop_id']; ?></td>
			<td><?php echo $party['title']; ?></td>
			<td><?php echo $party['content']; ?></td>
			<td><?php echo $party['price']; ?></td>
			<td><?php echo $party['created_at']; ?></td>
			<td><?php echo $party['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parties', 'action' => 'view', $party['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parties', 'action' => 'edit', $party['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parties', 'action' => 'delete', $party['id']), array('confirm' => __('Are you sure you want to delete # %s?', $party['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
			
	</div>
</div>
