<div class="users form">
<h1>Active</h1>
    <p>本登録が完了しました。</p>
    
</div>
<div class="actions">
    <?php if($activate_flag): ?>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('マイページ'), array('controller' => 'Users',
                'action' => 'mypage')); ?></li>
    </ul>
    <?php else: ?>
    
    
    <?php endif; ?>
    
</div>
