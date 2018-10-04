<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Login User</legend>
	<?php 
        echo $this->Form->label('username', $column['username']);
        echo $this->Form->input('username',
                                 array('label' => false)); ?>
        
        
        
    <?php 
        echo $this->Form->label('password', $column['password']);
        echo $this->Form->input('password',
                                 array('label' => false)); ?>
        
        <?php
		echo $this->Form->button('登録する',
                array('type' => 'submit',
                      'class' => ''));
        
        echo $this->Form->end();
	?>
        
	</fieldset>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('ユーザー仮登録'), array('controller' => 'UserRegistrs',
                'action' => 'signup')); ?></li>
    </ul>
</div>
