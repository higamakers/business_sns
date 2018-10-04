<div class="entries form">
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
    
    
</dl>    
<?php echo $this->Form->create('Entry'); ?>
	<fieldset>
	<?php
        echo $this->Form->label('comment', $column['comment']);
        
		echo $this->Form->input('comment',
                               array('label' => false));
        
        echo $this->Form->error('comment',null,
                array('wrap' => 'p',
                      'class' => '',
                      'id' => ''));
	?>
        
    <?php
		echo $this->Form->button('参加する',
                array('type' => 'submit',
                      'class' => ''));
        
        echo $this->Form->end();
	?>
	</fieldset>

</div>
<div class="actions">
	<?php echo $this->element('navigation'); ?>
</div>
