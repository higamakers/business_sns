<div class="profileImages form">
<?php echo $this->Form->create('User', 
                               array('type' => 'file',
                                     'id' => 'thumbnail')); ?>
	<fieldset>
		<legend><?php echo __('Add Users Thumbnail'); ?></legend>
	<?php
        
		echo $this->Form->input('thumbnail_url', array('type' => 'file', 'required' => false));
        
        //ヴァリデーションエラー
        //emptyは変数が空であっても警告を発しない
        if(!empty($upload_errors)){
            
           echo $upload_errors; 
            
        }
        
        
	?>
	</fieldset>
    
    <!-- 画像プレビューエリア -->
    <p>画像プレビュー</p>
    <img id="preview" width="80px" height="80px">
    <p>現在の画像</p>
    
    <?php echo $this->Profile->thumb80($thumbnail_url); ?>

<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profile Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>



<!-- 画像アップロード -->
<script type="text/javascript">

$('#thumbnail').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});    
    
    

$(function(){
    
    
    
    
    
})


</script>
