<div class="shopImages view">
<h2><?php echo __('Shop Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shopImage['Shop']['id'], array('controller' => 'shops', 'action' => 'view', $shopImage['Shop']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop Img Url'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['shop_img_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($shopImage['ShopImage']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop Image'), array('action' => 'edit', $shopImage['ShopImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shop Image'), array('action' => 'delete', $shopImage['ShopImage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shopImage['ShopImage']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
	</ul>
</div>
