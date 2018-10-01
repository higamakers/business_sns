<?php
App::uses('AppController', 'Controller');
//CakeEmail
App::uses('CakeEmail', 'Network/Email');


/**
 * Entries Controller
 */
class EntriesController extends AppController {

    public $uses = array('Entry', 'Party', 'Shop', 'User');
    
     public $helper = array('Party');
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );

    const ADD_SUCCESS = "保存に成功しました。";
    const ADD_FAILD = "保存に失敗しました。";
    const EDIT_SUCCESS = "編集に成功しました。";
    const EDIT_FAILD = "編集に失敗しました。";
    const DELETE_SUCCESS = "削除に成功しました。";
    const DELETE_FAILD = "削除に失敗しました。";
    
    
     //メールメッセージ
    const FROM_ADDRESS = "info@example.com";
    const FROM = "開発者";
    const TITLE = "交流会参加を受け付けました。";

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
        
    if($this->action === 'join_us'){ return true; }
        
    if($this->action === 'join_was'){ return true; }
        
    if($this->action === 'join_done'){ return true; }

    
	return parent::isAuthorized($user);

    }//isAuthorized
    
    
    public function join_us($id = null){
        
        //共通
        $user_id = $this->Auth->user('id');
        
        $party = $this->Party->find('first', 
                            array('conditions' => array('Party.id' => $id)));
            
            
            
            
        $this->set('party',$party);
        
        
        //多重メール送信対策
        $entry_flag = $this->Entry->find('count', array('conditions' =>
            array('party_id' => $id,
                  'user_id' => $user_id,
                  'delete_flag' => 0)));
        
        var_dump($entry_flag);
        
        
        if($id != null){
            
            
            if($this->request->isPost()){
                
                //多重メール送信対策、すでにデータベースに値があれば
                if($entry_flag < 1){
                
                
            $this->request->data['Entry']['party_id'] = $id;
            
            $this->request->data['Entry']['user_id'] = $user_id;    
                
            
                if($this->Entry->save($this->request->data)){
                    
                    
                    
            //保存したメールアドレスを取得
            $email_adress = $this->Auth->user('username');
            
            $email = new CakeEmail( 'gmail');// インスタンス化
            $email->from( array( self::FROM_ADDRESS => self::FROM)); // 送信元
            $email->to( $email_adress );// 送信先
            $email->subject(self::TITLE);// メールタイトル

            $email->emailFormat( 'text');// フォーマット
            $email->template( 'entry_message');// テンプレートファイル
            
                    
                    
                    
            // テンプレートに渡す変数
            $email->viewVars();

            $email->send(); 
                    
            $this->Session->write('entry_data', $this->request->data);
                
            $this->redirect(array('action' => 'join_was')); 
                    
                }else{
                    
                    
                    
                }
                    
                    
                }else{
                    
                    
                  $this->redirect(array('action' => 'join_done'));   
                    
                    
                    
                }
                
            
            
            
            }
            //GET
            
            
            $party = $this->Party->find('first', 
                            array('conditions' => array('Party.id' => $id)));
            
            
            
            
            
            $this->set('party',$party);
            
            
            
        }else{
            
            
            
            
            
            
        }
        
        
    }
     
    
    //参加完了処理
    public function join_was(){
        
        
        
        
    } 
    
    //すでに受付が完了してる場合
    public function join_done(){}
        
        
    
/*******************************************************/    


//Controller : Entries,entries
//Model : Entry,entry

    public function index(){

        $entries = $this->paginate();

        $this->set("entries", $entries);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->Entry->save($this->request->data)){
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect("index");
                
                
                
            }else{
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET

    }

    public function edit($id = null){

        if($id != null){
            
                
            if($this->request->isPost()){//POST
                
                $this->Entry->id = $id;
                
                
                
                if($this->Entry->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $entry = $this->Entry->read(null, $id);
            
            $this->request->data = $entry;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $entry = $this->Entry->read(null, $id);
            
            $this->set("entry", $entry);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->Entry->id = $id;
            
            if($this->Entry->exists()){
                
                if($this->Entry->delete()){
                    
                    $this->Flash->set(self::DELETE_SUCCESS);
                    
                    $this->redirect("index");
                    
                }else{
                    
                    $this->Flash->set(self::DELETE_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }else{
                     
               $this->redirect("index"); 
                
            }
            
            
        }else{
            
            $this->redirest("index");
            
            
        }

    }



    public function search(){

    $options = array();
	$searchword = array();
	
	if(!empty($this->data) || count($this->passedArgs) > 0){
		
		if(!isset($this->request->data['clear'])){
			
			//search on clicked
			if(isset($this->request->data['search'])){
			
			$searchword = $this->request->data["Entry"];
				
			//if search clicked page = 1	
			$this->request->params['named']['page'] = 1;
				
			}else{
			
				//next or prev on clicked
				foreach($this->passedArgs as $arg_key => $arg_value){
					//otherwise sort or direction or page
					if($arg_key != 'sort' && $arg_key != 'direction' && $arg_key != 'page'){
						
						
						$searchword[$arg_key] = $arg_value;
					}//if
					
				}//foreach
				
			}
				
			$this->request->data['Entry'] = $searchword;
			
		foreach($searchword as $search_key => $search_value){
			//otherwise sort or direction or page
			if($search_key != 'sort' && $search_key != 'direction' && $search_key != 'page'){
				if(isset($search_value) && $search_value != ''){
				
                    
				$options[$search_key . ' LIKE'] = "%{$search_value}%";
				   
                    
			}//if
			}
		}//foreach
		
			
		}else{
			//if redirect $this->request->data = null
			$this->request->data = null;
			//clear on clicked
			$this->redirect(array('action' => 'search'));
			
		}//if
		
	}//if
		$this->set('searchword', $searchword);
		$entries = $this->paginate($options);

		$this->set("entries", $entries);


    }




}
