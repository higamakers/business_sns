<?php
App::uses('AppController', 'Controller');
//CakeEmail
App::uses('CakeEmail', 'Network/Email');


/**
 * Users Controller
 */
class UserRegistrsController extends AppController {

    
    public $uses = array('User');
    
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
    
    //メールメッセージ
    const FROM_ADDRESS = "info@example.com";
    const FROM = "開発者";
    const TITLE = "登録ありがとうございます。";

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
    $this->Auth->allow("test", 
                       "signup",//ユーザー仮登録,
                       "confirm",//確認メール発送,
                       "already",//すでにメール配信済みの場合
                       "activate"//メール認証
                      );
        
    }//beforeFilter


    //一般ユーザーのアクセス許可
    //記載しない場合、ログインできない
    public function isAuthorized($user){
  
       
	if($this->action === 'index'){ return true; }

    
	return parent::isAuthorized($user);

    }//isAuthorized
    
    
    
    
    //ユーザー仮登録
    public function signup(){
        
        if($this->request->isPost()){//POST
            
            if($this->User->save($this->request->data)){
                
                
                //SaveしたIDを取得
                $user_id = $this->User->getLastInsertID();
                
                //多重メール送信を防ぐためSessionでIDを渡す
                $this->Session->write('User.user_id', $user_id);
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect('confirm');
                
                
                
            }else{
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET
        
        
    }
    
    //確認画面
    public function confirm(){
        
        //多重メール送信を防ぐためSessionでIDを受け取る
        $user_id = $this->Session->read('User.user_id');
        
        if($user_id !== null){
            
            $user = $this->User->read(null, $user_id);
            
            $this->User->id = $user_id;
            
            //登録日時のHash値を取得
            $insert_date_hash = $this->User->getActivationHash();
    
            //ドメイン以下本登録用URL
            $base_url = 'activate' . DS. $user_id . DS . $insert_date_hash;
            
            //保存したメールアドレスを取得
            $email_adress = $user['User']['username'];
            
            $email = new CakeEmail( 'gmail');// インスタンス化
            $email->from( array( self::FROM_ADDRESS => self::FROM)); // 送信元
            $email->to( $email_adress );// 送信先
            $email->subject(self::TITLE);// メールタイトル

            $email->emailFormat( 'text');// フォーマット
            $email->template( 'activate_message');// テンプレートファイル
    
            // テンプレートに渡す変数
            //本登録URL　id/insert_date
    
            $active_url = Router::url( $base_url, true);
    
    
            $email->viewVars( compact( 'active_url' ));

            $email->send();  
            
            
            //メール送信処理時、idを削除
            $this->Session->delete('User.user_id');
            
        }else{
            
            
            $this->redirect("already");
            
        }
        
        
    }
    
    
    public function already(){
        
        
    }
    
    
    //メール認証本登録    
    public function activate($user_id = null, $insert_date_hash = null){
    
    $this->User->id = $user_id;
    
        
    $user = $this->User->read(null, $user_id);
        
    $registr_flag = $user['User']['registr_flag'];    
        
    //有効無効フラグ
    $activate_flag = null;
    
        
    //本登録が完了していなければ    
    if($registr_flag == "0"){    
        
    //仮登録済みで登録日時のHASH値が一致すれば
    if ( $this->User->exists() && $insert_date_hash == $this->User->getActivationHash()) {
    // 本登録に有効なURL
        
        // statusフィールドを1に更新(本登録)
        $this->User->saveField( 'registr_flag', 1);
        
        
        
        $this->Flash->set( '本登録が完了しました。');
        
        //登録成功FLAG
        $activate_flag = true;
        
    }else{
    // 本登録に無効なURL
        $this->Flash->set( '無効なURLです');
        
        $activate_flag = false;
    }
        
    
    }else{
        //すでに本登録が完了していればマイページにログイン画面に飛ばす
        $this->Flash->set( 'すでに本登録が完了しています');
        
        $activate_flag = true;
    }
    
    $this->set('activate_flag', $activate_flag);
    
}
    
    
    
    





}
