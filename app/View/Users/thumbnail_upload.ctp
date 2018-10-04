<div class="profileImages form">
<?php echo $this->Form->create('User', 
                               array('type' => 'file',
                                     'id' => 'thumbnail')); ?>
	<fieldset>
		<legend><?php echo __('サムネイルアップロード'); ?></legend>
	<?php
        
		echo $this->Form->input('thumbnail_url', 
                                array('type' => 'file', 'required' => false,
                                     'label' => false));
    
        
        //ヴァリデーションエラー
        //emptyは変数が空であっても警告を発しない
        if(!empty($upload_errors)):
        
        ?>
            
           <?php echo $upload_errors; ?>
            
        <?php
        endif;
        
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
	<?php echo $this->element('navigation'); ?>
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
