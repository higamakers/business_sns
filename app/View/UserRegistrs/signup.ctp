<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
        
	<?php 
        echo $this->Form->label('username', $column['username']);
        
        echo $this->Form->input('username', 
                                array('label' => false,
                                       'error' => false)); 
        
        echo $this->Form->error('username',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        ?>
        
		<?php 
        echo $this->Form->label('password', $column['password']);
        
        echo $this->Form->input('password', 
                                array('label' => false,
                                       'error' => false)); 
        
        echo $this->Form->error('password',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
        
        ?>
        
        <?php 
        echo $this->Form->label('nickname', $column['nickname']);
        
        echo $this->Form->input('nickname', 
                                array('label' => false,
                                       'error' => false)); 
        echo $this->Form->error('nickname',null,
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
	
</div>
