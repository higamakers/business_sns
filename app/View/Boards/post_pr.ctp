<div class="boards form">
<?php echo $this->Form->create('Board', array('type' =>'file')); ?>
	<fieldset>
		<legend><?php echo __('投稿する'); ?></legend>
	<?php
        
		echo $this->Form->label('business_purpose_id', $column['business_purpose_id']);
        
		echo $this->Form->input('business_purpose_id', array('options' => $business_purpose_list,
                                     'label' => false,
                                     'error' => false));
        
        echo $this->Form->error('business_purpose_id',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
        echo $this->Form->label('title', $column['title']);
        
		echo $this->Form->input('title', array('label' => false,
                                               'error' => false));
        
        echo $this->Form->error('title',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
        
        echo $this->Form->label('content', $column['content']);
        
		echo $this->Form->input('content', array('label' => false,
                                               'error' => false));
        
        echo $this->Form->error('content',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
		
	?>
        
        <?php
        
        echo $this->Form->input('BoardImage.0.board_img_url',
                               array('type' => 'file',
                                     'required' => false));
        
        echo $this->Form->input('BoardImage.1.board_img_url',
                               array('type' => 'file',
                                     'required' => false));
        
        echo $this->Form->input('BoardImage.2.board_img_url',
                               array('type' => 'file',
                                     'required' => false));
        ?>
        
        
    <?php
		echo $this->Form->button('投稿する',
                array('type' => 'submit',
                      'class' => ''));
        
        echo $this->Form->end();
	?>    
	</fieldset>

</div>
<div class="actions">
	<?php echo $this->element('navigation'); ?>
</div>
