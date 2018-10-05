<div class="parties view">
<h2><?php echo __('Party'); ?></h2>
	<dl>
		<dt>タイトル</dt>
		<dd>
			<?php echo h($party['Party']['title']); ?>
			&nbsp;
		</dd>
		<dt>開催日</dt>
		<dd>
			<?php echo $this->Party->event_day($party); ?>
			&nbsp;
		</dd>
		<dt>開催時間</dt>
		<dd>
			<?php echo $this->Party->event_time($party); ?>
			&nbsp;
		</dd>
		<dt>開催場所</dt>
		<dd>
			<?php echo $this->Party->address($party); ?>
			&nbsp;
		</dd>
        <dt>地図</dt>
		<dd>
			<?php echo $party['Shop']['map_url']; ?>
			&nbsp;
		</dd>
		<dt>開催店舗名</dt>
		<dd>
			<?php echo h($party['Shop']['shop_name']); ?>
			&nbsp;
		</dd>
		<dt>料金</dt>
		<dd>
			<?php echo $this->Party->price($party); ?>
			&nbsp;
		</dd>
		<dt>詳細</dt>
		<dd>
			<?php echo h($party['Party']['content']); ?>
		</dd>
    
        
        
        
        <dt>参加申し込み</dt>
        
        <?php 
        
        if($party['Party']['end_flag'] == 0):
        if($entry_flag < 1): ?>
        
		<dd>
			<?php echo $this->Html->link('参加申込',
                            array('controller' => 'entries',
                                  'action' => 'join_us',
                                 $party['Party']['id'])); ?>
		</dd>
        
        <?php else: ?>
        
        <dd>
			参加受付完了
		</dd>
        
        <?php 
            endif;
            else: ?>
        
        <dd>
			<p>募集終了</p>
		</dd>
        
        
        
        <?php
            endif; ?>
        
	</dl>
</div>

<div class="actions">
	<?php echo $this->element('navigation'); ?>
</div>

<div class="related">
	<h3><?php echo __('参加者一覧'); ?></h3>
	<?php if (!empty($party['Entry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('nickname'); ?></th>
        <th><?php echo __('thumbnail_url'); ?></th>
        <th><?php echo __('comment'); ?></th>
	</tr>
	<?php foreach ($entry_lists as $entry_list): ?>
		<tr>
			<td><?php echo $entry_list['User']['nickname']; ?></td>
            <td><?php echo $this->Profile->thumb80($entry_list['User']['thumbnail_url']); ?></td>
            <td><?php echo $entry_list['Entry']['comment']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
