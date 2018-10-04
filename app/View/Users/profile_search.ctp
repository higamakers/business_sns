<h2><?php echo __('Users'); ?></h2>
<div class="users form">
    <button class="search_form_button">検索フォーム表示</button>    

    <div class="search_form">
    
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('プロフィール検索'); ?></legend>
        
        <?php 
        echo $this->Form->label('nickname', $column['nickname']);
        
		echo $this->Form->input('nickname',
                               array('label' => false)); 
        
        echo $this->Form->error('nickname',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('business_category_id', $column['business_category_id']);
        
        
		echo $this->Form->input('business_category_id', array('options' => $business_category_list,'empty' =>'---',
                                     'label' => false)); 
        
        echo $this->Form->error('business_category_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('business_small_category', $column['business_small_category']);
        
        
		echo $this->Form->input('business_small_category',
                               array('label' => false)); 
        
        echo $this->Form->error('business_small_category',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('business_pr', $column['business_pr']);
        
        
		echo $this->Form->input('business_pr',
                               array('label' => false)); 
        
        echo $this->Form->error('business_pr',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
    
		<?php 
        echo $this->Form->label('business_purpose_id', $column['business_purpose_id']);
        
        
		echo $this->Form->input('business_purpose_id', array('options' => $business_purpose_list,'empty' =>'---',
                                     'label' => false)); 
        
        echo $this->Form->error('business_purpose_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('business_status_id', $column['business_status_id']);
        
        
        echo $this->Form->input('business_status_id', array('options' => $business_status_list,'empty' =>'---',
                                     'label' => false)); 
        
        echo $this->Form->error('business_status_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('age_id', $column['age_id']);
        
        
		echo $this->Form->input('age_id',
                                array('options' => $age_list,'empty' =>'---',
                                     'label' => false)); 
        
        echo $this->Form->error('age_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('pref_id', $column['pref_id']);
        
        
		echo $this->Form->input('pref_id', 
                                array('options' => $pref_list,
                                        'empty' =>'---',
                                     'label' => false)); 
        
        echo $this->Form->error('pref_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		
	</fieldset>
    
<div class="button">    
    
<?php
		echo $this->Form->button('検索する',
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




<div class="users index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
        <th><?php echo h('thumbnail'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('business_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('business_small_category'); ?></th>
			<th><?php echo $this->Paginator->sort('business_purpose_id'); ?></th>
        <th><?php echo $this->Paginator->sort('business_pr'); ?></th>
			
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
			<?php echo $business_category_list[$user['User']['business_category_id']] ?>
		</td>
        
		<td><?php echo h($user['User']['business_small_category']); ?>&nbsp;</td>
        
		<td>
			<?php echo $business_purpose_list[$user['User']['business_purpose_id']] ?>
		</td>
        
		<td><?php echo $this->Profile->etc($user['User']['business_pr']); ?>&nbsp;</td>
        
        
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