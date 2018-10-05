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

<!-- メッセージの送受信状況 -->

<!-- PRにコメントがついたかどうか -->




	<div class="actions">
        <?php echo $this->element('user_menu', 
                                  array('role' => 
                                        $user['User']['role'])); ?>
        <br>
        
        <?php echo $this->element('navigation'); ?>
		
	</div>

<!-- CHECK情報 -->
<div class="related">
	<h3><?php echo __('チェック中のユーザー'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('サムネイル'); ?></th>
        <th><?php echo __('ユーザー名'); ?></th>
        <th><?php echo __('目的'); ?></th>
	</tr>
	<?php foreach ($check_users as $check_user): ?>
		<tr>
			<td>
            <?php echo $this->Profile->thumb80($check_user['CheckUser']['thumbnail_url']); ?></td>
            
            <td>
                <?php echo $this->Html->link($check_user['CheckUser']['nickname'], array('controller' => 'Users','action' => 'profile_view', $check_user['CheckUser']['id'])); ?>
                </td>
    <td><?php echo $check_user['Check']['purpose']; ?></td>
  
		</tr>
	<?php endforeach; ?>
	</table>
</div>

<!-- 交流会の参加情報 -->
<div class="related">
	<h3><?php echo __('参加予定交流会'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('開催日'); ?></th>
        <th><?php echo __('交流会名'); ?></th>
	</tr>
	<?php foreach ($entries as $entry): ?>
		<tr>
			<td><?php echo $this->Party->event_day($entry); ?></td>
            
            <td><?php $this->Html->link($entry['Party']['title'], array('controller' => 'Parties', 'action' => 'party_detail'. $entry['Party']['id'])); ?></td>
  
		</tr>
	<?php endforeach; ?>
	</table>
</div>

