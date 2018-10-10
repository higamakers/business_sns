<div class="users form">
<h1>Control Panel</h1>
    
    <ul>
    <li><?php echo $this->Html->link(__('マイページ'), array('controller' => 'Users', 'action' => 'mypage')); ?> 
    </li>    
    <li><?php echo $this->Html->link(__('店舗情報追加'), array('controller' => 'Shops', 'action' => 'add')); ?> 
    </li>
    <li><?php echo $this->Html->link(__('店舗一覧'), array('controller' => 'Shops', 'action' => 'index')); ?> 
    </li>
        
    <li><?php echo $this->Html->link(__('店舗画像追加'), array('controller' => 'ShopImages', 'action' => 'add')); ?> 
    </li>
        
    <li><?php echo $this->Html->link(__('交流会情報追加'), array('controller' => 'Parties', 'action' => 'add')); ?> 
    </li> 
        
    <li><?php echo $this->Html->link(__('交流会一覧'), array('controller' => 'Parties', 'action' => 'index')); ?> 
    </li>
        
    <li><?php echo $this->Html->link(__('投稿の承認'), array('controller' => 'Boards', 'action' => 'index')); ?> 
    </li>   
    
        
        </ul>
    
</div>
<div class="actions">
	
</div>
