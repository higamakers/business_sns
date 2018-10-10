
<h2><?php echo __('Boards'); ?></h2>
<div class="boards form">
    <button class="search_form_button">検索フォーム表示</button>
    
    
    
    <button class="post_pr">
    <?php echo $this->Html->link('投稿する', 
                                 array("controller" => "Boards",
                                       "action" => "post_pr")); ?>
    </button>
    
    <div class="search_form">
<?php echo $this->Form->create('Board'); ?>
	<fieldset>
		<legend><?php echo __('PRを探す'); ?></legend>
	<?php
        echo $this->Form->label('business_purpose_id', $column['business_purpose_id']);
        
		echo $this->Form->input('business_purpose_id', 
                                array('options' => $business_purpose_list,
                                    'empty' =>'---',
                                    'label' =>false,
                                    'error' => false));
        
        echo $this->Form->error('business_purpose_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
        
        
        echo $this->Form->label('title', $column['title']);
        
		echo $this->Form->input('title', 
                                array('label' =>false,
                                      'error' => false));
        echo $this->Form->error('title',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
        echo $this->Form->label('content', $column['content']);
        
		echo $this->Form->input('content', 
                                array('label' =>false,
                                      'error' => false));
        
        echo $this->Form->error('content',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
	?>
	</fieldset>
    
<div class="button">    
    
<?php
		echo $this->Form->button('検索',
                array('type' => 'submit',
				      'name' => 'search'));
	?>
&nbsp;<?php
		echo $this->Form->button('クリア',
                array('type' => 'submit',
				      'name' => 'clear'));
echo $this->Form->end(); ?>
    
    </div>    
</div>
    
</div>


<div class="actions">
	<?php echo $this->element('navigation'); ?>
</div>




<div class="boards index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
            <th>----</th>
			<th><?php echo $this->Paginator->sort($column['business_purpose_id']); ?></th>
			<th><?php echo $this->Paginator->sort($column['title']); ?></th>
			<th><?php echo $this->Paginator->sort($column['content']); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($boards as $board): ?>
	<tr>
		<td>
        <?php echo $this->Profile->thumb80($board['User']['thumbnail_url']); ?>
        </td>
		<td>
			<?php echo $business_purpose_list[$board['Board']['business_purpose_id']]; ?>
		</td>
		<td><?php echo h($board['Board']['title']); ?>&nbsp;</td>
		<td><?php echo h($board['Board']['content']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('詳細を見る'), array('action' => 'pr_view', $board['Board']['id'])); ?>
            

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

<script type="text/javascript">

    $(function(){
        
        $('.search_form').css('display', 'none');
        
        
        $('.search_form_button').on('click', function(){
            
            
            $('.search_form').toggle();
            
            console.log($('.search_form').css('display'))
           
            if($('.search_form').css('display') == 'none'){
                
                
                $('.search_form_button').text('検索フォームを表示')
                
            }else{
                
                $('.search_form_button').text('検索フォーム非表示')
                
            }
            
            
        })
    
        
        
        
    })
    

</script>