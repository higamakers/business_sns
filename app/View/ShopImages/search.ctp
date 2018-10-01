
<h2><?php echo __('Shop Images'); ?></h2>
<div class="shopImages form">
<?php echo $this->Form->create('ShopImage'); ?>
	<fieldset>
		<legend><?php echo __('Search Shop Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('shop_id');
		echo $this->Form->input('shop_img_url');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
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
		<li><?php echo $this->Html->link(__('New Shop Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
	</ul>
</div>




<div class="shopImages index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('shop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shop_img_url'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($shopImages as $shopImage): ?>
	<tr>
		<td><?php echo h($shopImage['ShopImage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shopImage['Shop']['id'], array('controller' => 'shops', 'action' => 'view', $shopImage['Shop']['id'])); ?>
		</td>
		<td><?php echo h($shopImage['ShopImage']['shop_img_url']); ?>&nbsp;</td>
		<td><?php echo h($shopImage['ShopImage']['type']); ?>&nbsp;</td>
		<td><?php echo h($shopImage['ShopImage']['size']); ?>&nbsp;</td>
		<td><?php echo h($shopImage['ShopImage']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($shopImage['ShopImage']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shopImage['ShopImage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shopImage['ShopImage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shopImage['ShopImage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $shopImage['ShopImage']['id']))); ?>
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