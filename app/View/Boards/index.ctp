<div class="boards index">
	<h2><?php echo __('Boards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', $column['id']); ?></th>
        
			<th><?php echo $this->Paginator->sort('user_id', $column['user_id']); ?></th>
        
			<th><?php echo $this->Paginator->sort('business_purpose_id', $column['business_purpose_id']); ?></th>
        
			<th><?php echo $this->Paginator->sort('title', $column['title']); ?></th>
        
			<th><?php echo $this->Paginator->sort('content', $column['content']); ?></th>
        
			<th><?php echo $this->Paginator->sort('app_flag', $column['app_flag']); ?></th>
        
        <th><?php echo $this->Paginator->sort('delete_flag', $column['delete_flag']); ?></th>
        
        <th>承認・公開状況</th>
        
			<th><?php echo $this->Paginator->sort('created_at', $column['created_at']); ?></th>
        
			<th><?php echo $this->Paginator->sort('updated_at', $column['updated_at']); ?></th>
        
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($boards as $board): ?>
	<tr>
		<td><?php echo h($board['Board']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $user_list[$board['Board']['user_id']]; ?>
		</td>
		<td>
			<?php echo $business_purpose_list[$board['Board']['business_purpose_id']]; ?>
		</td>
		<td><?php echo h($board['Board']['title']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['content']); ?>&nbsp;</td>
		
        <td><?php echo $app_status[$board['Board']['app_flag']]; ?>&nbsp;</td>
        <td><?php echo $delete_status[$board['Board']['delete_flag']]; ?>&nbsp;</td>
        
        <td><?php echo $app_delete_status[$board['Board']['app_flag']][$board['Board']['delete_flag']]; ?>&nbsp;</td>
		<td><?php echo h($board['Board']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('投稿確認', array('action' => 'view', $board['Board']['id'])); ?>
            
            
			<?php 
            
            if($board['Board']['app_flag'] == 0){
            
            echo $this->Form->postLink('投稿承認', array('action' => 'app', $board['Board']['id'])); 
            
            }else{
                
                echo "<a href=''>承認済</a>";
                
            }
            ?>
            
            
            
			<?php 
            
            if($board['Board']['delete_flag'] == 0){
            
            echo $this->Form->postLink('投稿削除', array('action' => 'delete', $board['Board']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $board['Board']['id']))); 
            
            }else{
                
                echo "<a href=''>削除済</a>";
                
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
