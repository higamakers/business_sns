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


<h2><?php echo __('Users'); ?></h2>
<div class="users form">
    <button class="search_form_button">検索フォーム表示</button>    

    <div class="search_form">
    
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Search User'); ?></legend>
	<?php
		echo $this->Form->input('nickname');
		echo $this->Form->input('business_category_id', array('options' => $business_categories,'empty' =>'未選択'));
		echo $this->Form->input('business_small_category');
		echo $this->Form->input('business_pr');
		echo $this->Form->input('business_purpose_id', array('options' => $business_purposes,'empty' =>'未選択'));
        echo $this->Form->input('business_status_id', array('options' => $business_statuses,'empty' =>'未選択'));
		echo $this->Form->input('age_id', array('options' => $ages,'empty' =>'未選択'));
		echo $this->Form->input('pref_id', array('options' => $prefs,'empty' =>'未選択'));
		
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
    
</div>




<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('My PAGE'), array('action' => 'mypage')); ?></li>
	</ul>
</div>




<div class="users index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
        <th><?php echo h('thumbnail'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('business_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('business_small_category'); ?></th>
			<th><?php echo $this->Paginator->sort('business_pr'); ?></th>
			<th><?php echo $this->Paginator->sort('business_purpose_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pref_id'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php 
        
        foreach ($other_users as $user): 
        ?>
	<tr>
		<td><?php echo $this->Profile->thumb80($user['User']['thumbnail_url']); ?>
            &nbsp;</td>
		<td><?php echo $this->Html->link($user['User']['nickname'], array('controller' => 'Users', 'action' => 'profile_view', $user['User']['id'])); ?>&nbsp;</td>
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
	</tr>
<?php 
        endforeach; ?>
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