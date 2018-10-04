<?php


App::uses('AppHelper', 'View/Helper');  
   
class ProfileHelper extends AppHelper { 

   public $helpers = array('Html');

    
    
    //80x80サムネイルの表示
    public function thumb80($url, $options = array()){
    
    if($url == "default.jpg"){
        
    $image_url = $this->Html->image("thumbnail".DS."thumb80_default".DS.$url, $options);    
        
        
    }else{    
        
    $image_url = $this->Html->image("thumbnail".DS."thumb80_".$url, $options);

    }
        
    return $this->output($image_url);
    
    
    
}
    
    //150x150サムネイルの表示
    public function thumb150($url, $options = array()){
    
    if($url == "default.jpg"){
        
    $image_url = $this->Html->image("thumbnail".DS."thumb80_default".DS.$url, $options);    
        
        
    }else{    
        
    $image_url = $this->Html->image("thumbnail".DS."thumb150_".$url, $options);

        
    }
        
    return $this->output($image_url);
    
    
    
}
    
    //自己紹介を１０文字以上の場合１０文字以下に編集
    public function etc($str){
        
        $text = $str;
        
        if(mb_strlen($str) >= 10){
            
            $text = mb_substr($str, 0, 10).'...';
            
            
            
        }
        
        return $text;
        
    }
    
    
    //テスト用
    public function hello(){
        
        
        $test = "hello";
        
        return $test;
        
    }
    
}
