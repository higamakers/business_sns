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
		<ul>
            
            <li><?php echo $this->Html->link(__('Profile edit'), array('controller' => 'Users', 'action' => 'profile_edit')); ?> </li>
            
            <li><?php echo $this->Html->link(__('Thumbnail Upload'), array('controller' => 'Users', 'action' => 'thumbnail_upload')); ?> </li>
            
            <li><?php echo $this->Html->link(__('Profile Search'), array('controller' => 'Users', 'action' => 'profile_search')); ?> </li>
            
            <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Users', 'action' => 'logout')); ?> </li>
            
             <li><?php echo $this->Html->link(__('Party List'), array('controller' => 'Parties', 'action' => 'party_list')); ?> </li>
            
            <br>
            <?php if($user['User']['role'] == 1): ?>
            
            <li><?php echo $this->Html->link(__('Cntrol Panel'), array('controller' => 'Admin', 'action' => 'ctl_panel')); ?> </li>
            
            <?php endif; ?>
            
            
            
		</ul>
	</div>

