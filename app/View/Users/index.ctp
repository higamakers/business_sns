<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('site_url'); ?></th>
			<th><?php echo $this->Paginator->sort('business_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('business_small_category'); ?></th>
			<th><?php echo $this->Paginator->sort('business_pr'); ?></th>
			<th><?php echo $this->Paginator->sort('business_purpose_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pref_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('manager_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('completed_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('registr_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['nickname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['company_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['site_url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['BusinessCategory']['id'], array('controller' => 'business_categories', 'action' => 'view', $user['BusinessCategory']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['business_small_category']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['business_pr']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['BusinessPurpose']['id'], array('controller' => 'business_purposes', 'action' => 'view', $user['BusinessPurpose']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Age']['id'], array('controller' => 'ages', 'action' => 'view', $user['Age']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Pref']['id'], array('controller' => 'preves', 'action' => 'view', $user['Pref']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['City']['id'], array('controller' => 'cities', 'action' => 'view', $user['City']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['manager_flag']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['completed_flag']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['registr_flag']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Search User'), array('action' => 'search')); ?></li>
        <li><?php echo $this->Html->link(__('Logout User'), array('action' => 'logout')); ?></li>
		<li><?php echo $this->Html->link(__('List Business Categories'), array('controller' => 'business_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Category'), array('controller' => 'business_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Purposes'), array('controller' => 'business_purposes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Purpose'), array('controller' => 'business_purposes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ages'), array('controller' => 'ages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age'), array('controller' => 'ages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preves'), array('controller' => 'preves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pref'), array('controller' => 'preves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
