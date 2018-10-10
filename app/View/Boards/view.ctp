<div class="boards view">
<h2><?php echo __('Board'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($board['Board']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($board['User']['id'], array('controller' => 'users', 'action' => 'view', $board['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Purpose'); ?></dt>
		<dd>
			<?php echo $this->Html->link($board['BusinessPurpose']['id'], array('controller' => 'business_purposes', 'action' => 'view', $board['BusinessPurpose']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($board['Board']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($board['Board']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('App Flag'); ?></dt>
		<dd>
			<?php echo h($board['Board']['app_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($board['Board']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($board['Board']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Board'), array('action' => 'edit', $board['Board']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Board'), array('action' => 'delete', $board['Board']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $board['Board']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Boards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Purposes'), array('controller' => 'business_purposes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Purpose'), array('controller' => 'business_purposes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Comments'), array('controller' => 'board_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Comment'), array('controller' => 'board_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Images'), array('controller' => 'board_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Image'), array('controller' => 'board_images', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Board Comments'); ?></h3>
	<?php if (!empty($board['BoardComment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Board Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($board['BoardComment'] as $boardComment): ?>
		<tr>
			<td><?php echo $boardComment['id']; ?></td>
			<td><?php echo $boardComment['board_id']; ?></td>
			<td><?php echo $boardComment['user_id']; ?></td>
			<td><?php echo $boardComment['comment']; ?></td>
			<td><?php echo $boardComment['created_at']; ?></td>
			<td><?php echo $boardComment['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'board_comments', 'action' => 'view', $boardComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'board_comments', 'action' => 'edit', $boardComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'board_comments', 'action' => 'delete', $boardComment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $boardComment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Board Comment'), array('controller' => 'board_comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Board Images'); ?></h3>
	<?php if (!empty($board['BoardImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Board Id'); ?></th>
		<th><?php echo __('Board Img Url'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($board['BoardImage'] as $boardImage): ?>
		<tr>
			<td><?php echo $boardImage['id']; ?></td>
			<td><?php echo $boardImage['board_id']; ?></td>
			<td><?php echo $boardImage['board_img_url']; ?></td>
			<td><?php echo $boardImage['type']; ?></td>
			<td><?php echo $boardImage['size']; ?></td>
			<td><?php echo $boardImage['created_at']; ?></td>
			<td><?php echo $boardImage['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'board_images', 'action' => 'view', $boardImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'board_images', 'action' => 'edit', $boardImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'board_images', 'action' => 'delete', $boardImage['id']), array('confirm' => __('Are you sure you want to delete # %s?', $boardImage['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Board Image'), array('controller' => 'board_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
