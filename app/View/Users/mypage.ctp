<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Thumbnail Url'); ?></dt>
		<dd>
			<?php echo $this->Profile->thumb80($thumbnail_url); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($user['User']['nickname']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>




	<div class="actions">
        <?php echo $this->element('user_menu', 
                                  array('role' => 
                                        $user['User']['role'])); ?>
        <br>
        
        <?php echo $this->element('navigation'); ?>
		
	</div>

