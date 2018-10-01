
		<ul>
            <li><?php echo $this->Html->link(__('プロフィール編集'), array('controller' => 'Users', 'action' => 'profile_edit')); ?> </li>
            
            <li><?php echo $this->Html->link(__('サムネイルアップロード'), array('controller' => 'Users', 'action' => 'thumbnail_upload')); ?> </li>
            
            <li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'Users', 'action' => 'logout')); ?> </li>
            
            <br>
            <?php if($role == 1): ?>
            
            <li><?php echo $this->Html->link(__('コントロールパネル'), array('controller' => 'Admin', 'action' => 'ctl_panel')); ?> </li>
            
            <?php endif; ?>
            
            
            
		</ul>

