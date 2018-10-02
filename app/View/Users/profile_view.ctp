<div class="users view">

<h2><?php echo __('User'); ?></h2>
    
    <?php 
    //ユーザーをチェック中かどうか判定
    if($check_status == 0): ?>
    
    <p><?php echo $this->Html->link("このユーザーをチェックする", 
                            array("controller" => "Checks",
                                  "action" => "check_user",
                                 "?" => array(
                    "other_user" => $other_user['User']['id'],
        'before_check_status' => $before_check_status))); ?></p>
    <?php else: ?>
    
    
    <?php echo $this->Form->postLink('チェック中', 
                        array("controller" => 'Checks',
                              'action' => 'check_out', 
                            $other_user['User']['id']), array('confirm' => "チェックを外しますか？")); ?>
    
    <?php endif; ?>
	<dl>
        <dt><?php echo __('Thumbnail'); ?></dt>
		<dd>
			<?php echo $this->Profile->thumb80($other_user['User']['thumbnail_url']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($other_user['User']['nickname']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
       
        <!-- 後でこのユーザーの参加予定交流会一覧を表示 -->
        <?php echo $this->element('navigation'); ?>
		

</div>
