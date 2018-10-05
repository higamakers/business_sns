<div class="users view">

<h2><?php echo h($user['User']['nickname']); ?></h2>
    
<h3><?php echo $this->Profile->thumb80($user['User']['thumbnail_url']); ?></h3>    
    
    
	<dl>
        
        <dt><?php echo $column['age_id'] ?></dt>
		<dd>
			<?php echo $age_list[ $user['User']['age_id'] ]; ?>
			&nbsp;
		</dd>
		<dt><?php echo $column['pref_id'] ?></dt>
		<dd>
			<?php echo $pref_list[ $user['User']['pref_id'] ]; ?>
			&nbsp;
		</dd>
        
        <dt><?php echo $column['site_url']; ?></dt>
		<dd>
			<?php echo h($user['User']['site_url']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo $column['business_category_id']; ?></dt>
		<dd>
			<?php echo $business_category_list[ $user['User']['business_category_id']]; ?>
			&nbsp;
		</dd>
        
		<dt><?php echo $column['business_small_category']; ?></dt>
		<dd>
			<?php echo $user['User']['business_small_category']; ?>
			&nbsp;
		</dd>
        
        <dt><?php echo $column['business_status_id']; ?></dt>
		<dd>
			<?php echo $business_category_list[ $user['User']['business_status_id'] ]; ?>
			&nbsp;
		</dd>
        
        
        
        <dt><?php echo $column['business_purpose_id']; ?></dt>
		<dd>
			<?php echo $business_purpose_list[ $user['User']['business_purpose_id']]; ?>
			&nbsp;
		</dd>
        
		<dt><?php echo $column['business_pr'] ?></dt>
		<dd>
			<?php echo $user['User']['business_pr']; ?>
			&nbsp;
		</dd>
        
	</dl>
</div>


<div class="actions">
    
        <?php echo $this->element('navigation'); ?>
		

</div>

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


