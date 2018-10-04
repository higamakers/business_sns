<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'POST')); ?>
	<fieldset>
		<legend><?php echo __('プロフィール編集'); ?></legend>
	<?php
        echo $this->Form->label('nickname', $column['nickname']);
        
		echo $this->Form->input('nickname',
                               array('label' =>false));
        
        echo $this->Form->error('nickname',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
    ?>    
       
    <?php   
        
        echo $this->Form->label('site_url', $column['site_url']);
        
		echo $this->Form->input('site_url',
                               array('label' =>false));
        
        echo $this->Form->error('site_url',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
    ?> 
        
    <?php    
        echo $this->Form->label('business_category_id', $column['business_category_id']);
        
		echo $this->Form->input('business_category_id',
                array('options' => $business_category_list,
                     'label' => false));
        
        echo $this->Form->error('business_category_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
    ?>    
       
    <?php
        echo $this->Form->label('business_small_category', $column['business_small_category']);
        
		echo $this->Form->input('business_small_category',
                               array('label' =>false));
        
        echo $this->Form->error('business_small_category',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
    ?>    
       
    <?php
        echo $this->Form->label('business_pr', $column['business_pr']);
        
		echo $this->Form->input('business_pr',
                               array('label' =>false));
        
        echo $this->Form->error('business_pr',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
    ?>    
       
    <?php
        echo $this->Form->label('business_purpose_id', $column['business_purpose_id']);
        
		echo $this->Form->input('business_purpose_id',
                               array('options' =>$business_purpose_list,
                                    'label' => false));
        
        echo $this->Form->error('business_purpose_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
    ?>    
       
    <?php
        echo $this->Form->label('business_status_id', $column['business_status_id']);
        
        echo $this->Form->input('business_status_id',
                               array('options' =>$business_status_list,
                                    'label' => false));
        
        
        echo $this->Form->error('business_status_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
    ?>    
       
    <?php     
        echo $this->Form->label('age_id', $column['age_id']);
        
		echo $this->Form->input('age_id',
                               array('options' =>$age_list,
                                    'label' => false));
        
        echo $this->Form->error('age_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
    ?>    
       
    <?php 
        echo $this->Form->label('pref_id', $column['pref_id']);
        
		echo $this->Form->input('pref_id',
                               array('options' =>$pref_list,
                                    'label' => false));
        
        echo $this->Form->error('pref_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
		
	?>
        
        
    <?php
		echo $this->Form->button('登録する',
                array('type' => 'submit',
                      'class' => ''));
        
        echo $this->Form->end();
	?>    
	</fieldset>

</div>
<div class="actions">
	<?php echo $this->element('navigation'); ?>
</div>
