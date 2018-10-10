
<h2><?php echo __('Board Answers'); ?></h2>
<div class="boardAnswers form">
<?php echo $this->Form->create('BoardAnswer'); ?>
	<fieldset>
		<legend><?php echo __('Search Board Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('board_id');
		echo $this->Form->input('board_question_id');
		echo $this->Form->input('post_user_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment');
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
		<li><?php echo $this->Html->link(__('New Board Answer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Boards'), array('controller' => 'boards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('controller' => 'boards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Questions'), array('controller' => 'board_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Question'), array('controller' => 'board_questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>




<div class="boardAnswers index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('board_id'); ?></th>
			<th><?php echo $this->Paginator->sort('board_question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('post_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($boardAnswers as $boardAnswer): ?>
	<tr>
		<td><?php echo h($boardAnswer['BoardAnswer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($boardAnswer['Board']['title'], array('controller' => 'boards', 'action' => 'view', $boardAnswer['Board']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($boardAnswer['BoardQuestion']['id'], array('controller' => 'board_questions', 'action' => 'view', $boardAnswer['BoardQuestion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($boardAnswer['PostUser']['id'], array('controller' => 'users', 'action' => 'view', $boardAnswer['PostUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($boardAnswer['User']['id'], array('controller' => 'users', 'action' => 'view', $boardAnswer['User']['id'])); ?>
		</td>
		<td><?php echo h($boardAnswer['BoardAnswer']['comment']); ?>&nbsp;</td>
		<td><?php echo h($boardAnswer['BoardAnswer']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($boardAnswer['BoardAnswer']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $boardAnswer['BoardAnswer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $boardAnswer['BoardAnswer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $boardAnswer['BoardAnswer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $boardAnswer['BoardAnswer']['id']))); ?>
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