<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Login User</legend>
	<?php echo $this->Form->input('username');
echo $this->Form->input('password'); ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('ユーザー仮登録'), array('controller' => 'UserRegistrs',
                'action' => 'signup')); ?></li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
    </ul>
</div>
