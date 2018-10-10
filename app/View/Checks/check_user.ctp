<div class="checks form">
<?php echo $this->Form->create('Check'); ?>
	<fieldset>
		<legend><?php echo __('チェックする'); ?></legend>
	<?php
        
        echo $this->Form->label('purpose', $column['purpose']);
		
    
        echo $this->Form->input('purpose', 
                                array('label' => false,
                                       'error' => false));
        
         echo $this->Form->error('purpose',null,
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
