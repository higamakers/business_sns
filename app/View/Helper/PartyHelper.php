<?php


App::uses('AppHelper', 'View/Helper');  
   
class PartyHelper extends AppHelper { 

   public $helpers = array('Html');

    //時分秒を時分に直す
    public function time_minutes($time_minutes_second){
        
        $time_minutes = substr($time_minutes_second, 0, -3);
        
        return $time_minutes;
        
    }
    
    //開催日を表示
    public function event_day($party){
        
        $event_day = $party['Party']['year'].'年'.$party['Party']['month'].'月'.$party['Party']['day'].'日';
        
        return $event_day;
        
    }
    
    
    //開催時間を表示
    public function event_time($party){
        
        $start_time = $this->time_minutes($party['Party']['start_time']);
        
        $end_time = $this->time_minutes($party['Party']['end_time']);
        
        $event_time = $start_time.'~'.$end_time;
        
        return $event_time;
        
    }
    
    //料金
    public function price($party){
        
        $price = substr_replace($party['Party']['price'], ',', -3, 0);
        
        
        
        return $price.'円';
    }
    
    //住所を表示
    public function address($party){
        
        App::import('Model', 'Pref'); 
        $pref = new Pref();
        
        $party_list = $pref->find('list', array('fields' => 'pref_name'));
        
        
        $address = $party_list[$party['Shop']['pref_id']].$party['Shop']['city'].$party['Shop']['addr'];
        
        return $address;
        
    }
    
}
