<div class="parties index">
	<h2><?php echo __('交流会一覧'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort($column['id']); ?></th>
			<th><?php echo $this->Paginator->sort($column['year']); ?></th>
			<th><?php echo $this->Paginator->sort($column['month']); ?></th>
			<th><?php echo $this->Paginator->sort($column['day']); ?></th>
			<th><?php echo $this->Paginator->sort($column['start_time']); ?></th>
			<th><?php echo $this->Paginator->sort($column['end_time']); ?></th>
			<th><?php echo $this->Paginator->sort($column['shop_id']); ?></th>
			<th><?php echo $this->Paginator->sort($column['title']); ?></th>
			<th><?php echo $this->Paginator->sort($column['content']); ?></th>
			<th><?php echo $this->Paginator->sort($column['price']); ?></th>
			<th><?php echo $this->Paginator->sort($column['end_flag']); ?></th>
			<th><?php echo $this->Paginator->sort($column['created_at']); ?></th>
			<th><?php echo $this->Paginator->sort($column['updated_at']); ?></th>
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
			<?php echo $this->Html->link($shop_list[$party['Shop']['id']], array('controller' => 'shops', 'action' => 'view', $party['Shop']['id'])); ?>
		</td>
		<td><?php echo h($party['Party']['title']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['content']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['price']); ?>&nbsp;</td>
		<td><?php echo h($end_list[$party['Party']['end_flag']]); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($party['Party']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $party['Party']['id'])); ?>
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $party['Party']['id'])); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $party['Party']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $party['Party']['id']))); ?>
            
            
            
            
            <?php 
            
            if($party['Party']['end_flag'] == 0){
            echo $this->Form->postLink(__('募集終了'), array('action' => 'end_party', $party['Party']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $party['Party']['id']))); 
            
            }else{
                
            echo $this->Form->postLink(__('募集再開'), array('action' => 'start_party', $party['Party']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $party['Party']['id'])));     
                
                
            }
            ?>
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
