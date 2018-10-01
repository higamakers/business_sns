<?php
App::uses('AppController', 'Controller');
//CakeEmail
App::uses('CakeEmail', 'Network/Email');


/**
 * Users Controller
 */
class AdminController extends AppController {

    
    //public $uses = array('User');
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );

    
    const LOGIN_SUCCESS = "ログインに成功しました。";
    const LOGIN_FAILD = "ログインに失敗しました。";

    const ADD_SUCCESS = "保存に成功しました。";
    const ADD_FAILD = "保存に失敗しました。";
    const EDIT_SUCCESS = "編集に成功しました。";
    const EDIT_FAILD = "編集に失敗しました。";
    const DELETE_SUCCESS = "削除に成功しました。";
    const DELETE_FAILD = "削除に失敗しました。";
    
    

/**
 *
 * document
 * 
 * Inflector::pluralize() model > models
 * Inflector::singularize() models > model
 *
 */

    public function beforeFilter() {
    parent::beforeFilter();
        
    //ログインせずに許可するアクション
    $this->Auth->allow();
        
    }//beforeFilter


    //一般ユーザーのアクセス許可
    //記載しない場合、ログインできない
    public function isAuthorized($user){
  
        
    
       
	if($this->action === 'index'){ return true; }

    
	return parent::isAuthorized($user);

    }//isAuthorized
    
    
    
    
    //コントロールパネル
    public function ctl_panel(){
        
        
        
        
    }
    





}
