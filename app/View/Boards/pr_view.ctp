<div class="boards view">
<h2><?php echo h($board['Board']['title']); ?></h2>
    <?php if($post_flag == 1): ?>
    
    <p>投稿を削除する</p>
    
    <?php endif; ?>
    
    
    <?php if($img_flag != 0): ?>
    
    
    
 
    <div class='container'>
      <div class='single-item'>
          
          
<?php foreach($board['BoardImage'] as $key => $board_image): ?>          
        <div>
          <?php echo $this->Board->thumb500($board_image['board_img_url']); ?>
        </div>
          
<?php endforeach; ?>          
        
      </div><!-- .single-item -->
    </div><!-- .container -->
    
<br>
    
    <?php endif; ?>
    
    
	<dl>
		
        <dt>サムネイル</dt>
        <dd><?php echo $this->Profile->thumb80($board['User']['thumbnail_url']); ?></dd>
		<dt>投稿者</dt>
		<dd>
			<?php echo $this->Html->link($board['User']['nickname'], array('controller' => 'users', 'action' => 'profile_view', $board['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo $column['business_purpose_id']; ?></dt>
		<dd>
			<?php echo $business_purpose_list[$board['User']['business_purpose_id']]; ?>
			&nbsp;
		</dd>
		
		<dt><?php echo $column['content']; ?></dt>
		<dd>
			<?php echo h($board['Board']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>



	<div class="actions">
		<?php echo $this->element('navigation'); ?>
	</div>

<?php echo $this->Html->script('slick', array('inline' => true)); ?>
<script type="text/javascript">


$(function(){
  $('.single-item').slick({
    accessibility: true,
    autoplay: true,
    autoplaySpeed: 1000,
    dots: true,
    fade: true,
  });
});




</script>


