<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($user['User']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Url'); ?></dt>
		<dd>
			<?php echo h($user['User']['site_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['BusinessCategory']['id'], array('controller' => 'business_categories', 'action' => 'view', $user['BusinessCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Small Category'); ?></dt>
		<dd>
			<?php echo h($user['User']['business_small_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Pr'); ?></dt>
		<dd>
			<?php echo h($user['User']['business_pr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Purpose'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['BusinessPurpose']['id'], array('controller' => 'business_purposes', 'action' => 'view', $user['BusinessPurpose']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Age']['id'], array('controller' => 'ages', 'action' => 'view', $user['Age']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pref'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Pref']['id'], array('controller' => 'preves', 'action' => 'view', $user['Pref']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['City']['id'], array('controller' => 'cities', 'action' => 'view', $user['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manager Flag'); ?></dt>
		<dd>
			<?php echo h($user['User']['manager_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Completed Flag'); ?></dt>
		<dd>
			<?php echo h($user['User']['completed_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registr Flag'); ?></dt>
		<dd>
			<?php echo h($user['User']['registr_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Entries'); ?></h3>
	<?php if (!empty($user['Entry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Party Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Entry'] as $entry): ?>
		<tr>
			<td><?php echo $entry['id']; ?></td>
			<td><?php echo $entry['party_id']; ?></td>
			<td><?php echo $entry['user_id']; ?></td>
			<td><?php echo $entry['created_at']; ?></td>
			<td><?php echo $entry['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entries', 'action' => 'view', $entry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entries', 'action' => 'edit', $entry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entries', 'action' => 'delete', $entry['id']), array('confirm' => __('Are you sure you want to delete # %s?', $entry['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
