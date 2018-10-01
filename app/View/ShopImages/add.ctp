<div class="shopImages form">
<?php echo $this->Form->create('ShopImage', array(
    'type' => 'file',
    'id' => 'shop_image')); ?>
	<fieldset>
		<legend><?php echo __('Add Shop Image'); ?></legend>
	<?php
		echo $this->Form->input('shop_id', array('options' => $shop_list));
		echo $this->Form->input('shop_img_url', array('type' => 'file', 'required' => false));
	?>
	</fieldset>
    
    <!-- 画像プレビューエリア -->
    <p>画像プレビュー</p>
    <img id="preview" width="80px" height="80px">
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Shop Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
	</ul>
</div>

<!-- 画像アップロード -->
<script type="text/javascript">

$('#shop_image').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});    
    
    

$(function(){
    
    
    
    
    
})


</script>

