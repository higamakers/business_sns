<?php


App::uses('AppHelper', 'View/Helper');  
   
class BoardHelper extends AppHelper { 

   public $helpers = array('Html');

    
    
    //80x80サムネイルの表示
    public function thumb80($url, $options = array()){
    
    if($url == "default.jpg"){
        
    $image_url = $this->Html->image("board_img".DS."thumb80_default".DS.$url, $options);    
        
        
    }else{    
        
    $image_url = $this->Html->image("board_img".DS."thumb80_".$url, $options);

    }
        
    return $this->output($image_url);
    
    
    
}
    
    //150x150サムネイルの表示
    public function thumb500($url, $options = array()){
    
    if($url == "default.jpg"){
        
    $image_url = $this->Html->image("board_img".DS."thumb500_default".DS.$url, $options);    
        
        
    }else{    
        
    $image_url = $this->Html->image("board_img".DS."thumb500_".$url, $options);

        
    }
        
    return $this->output($image_url);
    
    
    
}
    
    
    //テスト用
    public function hello(){
        
        
        $test = "hello";
        
        return $test;
        
    }
    
}
