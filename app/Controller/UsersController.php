<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 */
class UsersController extends AppController {

    //テスト用に表示件数を1に
    public $paginate = array('limit' => 1);

    
    
    public $helpers = array("Profile");
    
    
    public $uses = array('User', 
                        'Age',
                        'BusinessCategory',
                        'BusinessPurpose',
                        'BusinessStatus',
                        'Pref');
    
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
    $this->Auth->allow('login',"search", "add");
        
    }//beforeFilter


    //一般ユーザーのアクセス許可
    //記載しない場合、ログインできない
    public function isAuthorized($user){
  
       
    if($this->action === 'mypage'){ return true; }  
        
	if($this->action === 'profile_edit'){ return true; }
        
    if($this->action === 'thumbnail_upload'){ return true; } 
        
    if($this->action === 'profile_search'){ return true; }
        
    if($this->action === 'profile_view'){ return true; }
        
        
        
        
	if($this->action === 'view'){ return true; }

	if($this->action === 'login'){ return true; }
    
    if($this->action === 'edit'){ return true; }

	if($this->action === 'logout'){ return true; }
    
	return parent::isAuthorized($user);

    }//isAuthorized



        /**
    *
    *
    * Auth Login
    *
    **/
    	public function login(){

		
        if($this->request->isPost()){

            //Login
            if($this->Auth->login()){//Succcess

                $url = $this->Auth->redirect();
                $this->redirect($url);

            }else{//Failure

                $this->Flash->set(self::LOGIN_FAILD);
                
            }

        }else{ //GETメソッド
            
            //ログイン済みであれば、自動ログイン
            if($this->Auth->login()){
                 $url = $this->Auth->redirect();
                $this->redirect($url);
                
            }

	}
    }//login


    public function logout(){

        $this->Session->destroy();
        $url = $this->Auth->logout();

        $this->redirect($url);
    }//logout

    
    //マイページ
    public function mypage(){
        
        $user_id = $this->Auth->user("id");
        
        $user = $this->User->read(null,$user_id);
        
        $thumbnail_url = $user['User']['thumbnail_url'];
        
        
        $this->set("user", $user);
        $this->set("thumbnail_url", $thumbnail_url);
        
    }
    
    //プロフィール編集
    public function profile_edit(){
        
        
        //user_idを取得
        $user_id = $this->Auth->user("id");
        
        
        
        
        
        if($user_id != null){
            
                
            if($this->request->isPost()){//POST
                
                $this->User->id = $user_id;
                
                $this->request->data['User']['id'] = $user_id;
                
                if($this->User->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("mypage");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("mypage");
                    
                }
                
                
            }
            //GET
            $user = $this->User->read(null, $user_id);
            
        //各リストを取得
        $ages = $this->Age->find('list', array('fields' => 'age_name'));
            
        $business_categoris = $this->BusinessCategory->find('list', array('fields' => 'category_name'));
        $prefs = $this->Pref->find('list', array('fields' => 'pref_name'));
            
        $business_purposes = $this->BusinessPurpose->find('list', array('fields' => 'business_purpose_name'));
            
        $business_statuses = $this->BusinessStatus->find('list', array('fields' => 'business_status_name'));
            
        $prefs = $this->Pref->find('list', array('fields' => 'pref_name'));
        
        //すでにある値をセット
        $this->request->data = $user;    
            
            
        $this->set("ages",$ages);
        $this->set("business_categories",$business_categoris);
        $this->set("business_purposes",$business_purposes);
        $this->set("business_statuses", $business_statuses);   
        $this->set("prefs",$prefs);
            
            
            
            
        }else{
            
            $this->redirect("mypage");
            
        }
         
    }
    
    //サムネイルアップロード
    public function thumbnail_upload(){
        //GET&&POST共通
        
        $user_id = $this->Auth->user('id');
        
        
       
        //type = "file"は画面更新の際、PUTメソッドになる
        if($this->request->isPost() || $this->request->is('put')){
        
        $user_id = $this->Auth->user('id');
        
          
        //拡張子を取り出す
        $ext = pathinfo($this->request->data['User']['thumbnail_url']['name'], PATHINFO_EXTENSION);
            
        //ファイル名を改名
        $file_name = $user_id.date('YmdHis');    
            
            
        $this->request->data['User']['thumbnail_url']['name'] = $file_name.".".$ext;
            
        
        
           
        $this->User->id = $user_id;
            
        $this->request->data['User']['id'] = $user_id;    
            
           
            
        if($this->User->save($this->request->data)){
            
            $this->Flash->set(self::ADD_SUCCESS);
            
            $this->redirect(array('controller' => 'users', 'action' => 'mypage'));
            
        }else{
            
            //バリデーションエラーメッセージを表示する
            var_dump($this->User->validationErrors);
            
            
            $upload_errors = $this->User->validationErrors['thumbnail_url'][0];
            
            $this->set('upload_errors', $upload_errors);
            
            $this->Flash->set(self::ADD_FAILD);
            
        }
        
            
            
        }
        //GET

        
        
        $user = $this->User->read(null, $user_id);
        
        $thumbnail_url = $user['User']['thumbnail_url'];
        
        $this->set('thumbnail_url', $thumbnail_url);
        
        $this->set('user_id', $user_id);
        
        
         
    }
    
    
    //プロフィール検索
    public function profile_search(){

        
    $user_id = $this->Auth->user('id');    
        
    $options = array();
	$searchword = array();
	
	if(!empty($this->data) || count($this->passedArgs) > 0){
		
		if(!isset($this->request->data['clear'])){
			
			//search on clicked
			if(isset($this->request->data['search'])){
			
			$searchword = $this->request->data["User"];
				
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
				
			$this->request->data['User'] = $searchword;
			
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
			$this->redirect(array('action' => 'profile_search'));
			
		}//if
		
	}//if
		$this->set('searchword', $searchword);
        
        
        //ログインユーザーは表示しない
        $options['User.id !='] = $user_id;
        
        
        
		$other_users = $this->paginate($options);

        
        
        
        //各リストを取得
        $ages = $this->Age->find('list', array('fields' => 'age_name'));
            
        $business_categories = $this->BusinessCategory->find('list', array('fields' => 'category_name'));
        $prefs = $this->Pref->find('list', array('fields' => 'pref_name'));
            
        $business_purposes = $this->BusinessPurpose->find('list', array('fields' => 'business_purpose_name'));
            
        $business_statuses = $this->BusinessStatus->find('list', array('fields' => 'business_status_name'));
            
        $prefs = $this->Pref->find('list', array('fields' => 'pref_name'));
        
            
        $this->set("ages",$ages);
        $this->set("business_categories",$business_categories);
        $this->set("business_purposes",$business_purposes);
        $this->set("business_statuses", $business_statuses);   
        $this->set("prefs",$prefs);
        
        
        
		$this->set("other_users", $other_users);
        



    }
    
    
    
    //他人のプロフィールページ
    public function profile_view($id = null){
        
        if($id != null){
            
            $other_user = $this->User->read(null, $id);
            
            $this->set("other_user", $other_user);
            
            
            
        }else{
            
            
            $this->redirect("profile_search");
            
        }
        
    }
    
    
    
/*********************************************************/


//Controller : Users,users
//Model : User,user

    public function index(){

        $users = $this->paginate();

        $this->set("users", $users);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->User->save($this->request->data)){
                
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
                
                $this->User->id = $id;
                
                
                
                if($this->User->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $user = $this->User->read(null, $id);
            
            $this->request->data = $user;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $user = $this->User->read(null, $id);
            
            $this->set("user", $user);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->User->id = $id;
            
            if($this->User->exists()){
                
                if($this->User->delete()){
                    
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
			
			$searchword = $this->request->data["User"];
				
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
				
			$this->request->data['User'] = $searchword;
			
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
		$users = $this->paginate($options);

		$this->set("users", $users);


    }




}
