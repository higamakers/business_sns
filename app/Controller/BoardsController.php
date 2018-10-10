<?php
App::uses('AppController', 'Controller');
/**
 * Boards Controller
 */
class BoardsController extends AppController {


    public $helper = array('Party', 'Profile', 'Board');
    
    public $uses = array('Board','User', 'BusinessPurpose', 'BoardImage');
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );
    
    const ADD_SUCCESS = "保存に成功しました。";
    const ADD_FAILD = "保存に失敗しました。";
    const EDIT_SUCCESS = "編集に成功しました。";
    const EDIT_FAILD = "編集に失敗しました。";
    const DELETE_SUCCESS = "削除に成功しました。";
    const DELETE_FAILD = "削除に失敗しました。";
    
    const APP_SUCCESS = "承認に成功しました。";
    const APP_FAILD = "承認に失敗しました。";
    
    
     public function beforeFilter() {
    parent::beforeFilter();
        
    //ログインせずに許可するアクション
    $this->Auth->allow();
        
    }//beforeFilter


    //一般ユーザーのアクセス許可
    //記載しない場合、ログインできない
    public function isAuthorized($user){
  
        
    
       
	if($this->action === 'pr_search'){ return true; }
        
    if($this->action === 'pr_view'){ return true; }    

    
	return parent::isAuthorized($user);

    }//isAuthorized
    
    protected $business_purpose_list;
    
    protected $user_list;
    
    function __construct($request, $response){ 
        
        //各リストを取得
       $this->business_purpose_list = $this->BusinessPurpose->find('list', array('fields' => 'business_purpose_name'));
        
       $this->user_list = $this->User->find('list', array('fields' => 'nickname'));
        
            
        
        parent::__construct($request, $response);
    }
    
    public $column = 
        array('id' => 'No.',
        'business_purpose_id' => 'カテゴリー',
              'user_id' => '投稿者',
              'title' => 'タイトル',
              'content' => '内容',
              'app_flag' => '承認状態',
              'delete_flag' => '削除状態',
              'created_at' => '追加日時',
              'updated_at' => '更新日時');

/**
 *
 * document
 * 
 * Inflector::pluralize() model > models
 * Inflector::singularize() models > model
 *
 */

public function pr_search(){
    
   $options = array();
	$searchword = array();
	
	if(!empty($this->data) || count($this->passedArgs) > 0){
		
		if(!isset($this->request->data['clear'])){
			
			//search on clicked
			if(isset($this->request->data['search'])){
			
			$searchword = $this->request->data["Board"];
				
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
				
			$this->request->data['Board'] = $searchword;
			
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
    
        //削除済みは表示しない
        $options['Board.delete_flag !='] = 1;
    
        //未承認は表示しない
        $options['Board.app_flag !='] = 0;
    
    
        
		$this->set('searchword', $searchword);
		$boards = $this->paginate($options);

        $this->set('column', $this->column);
    
        $this->set('business_purpose_list', $this->business_purpose_list);
    
		$this->set("boards", $boards); 
    
}    
    
    
    
     public function post_pr(){

         
         $user_id = $this->Auth->user('id');
         
        if($this->request->isPost()){//POST
            
            foreach($this->request->data['BoardImage'] as $key => $board_image){
                
                
                //画像が空なら、validationに弾かれるため配列から削除
                //saveAllにより、アソシエーションモデルのidは自動で保存される
                if($board_image['board_img_url']['name'] == "" 
                   || $board_image['board_img_url']['size'] == ""){
                    
                  unset($this->request->data['BoardImage'][$key]); 
                    
                }
                
            }
            
            $this->request->data['Board']['user_id'] = $user_id;
            
            
            if($this->Board->saveAll($this->request->data)){
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect("pr_search");
                
                
                
            }else{
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET
         
         $this->set('column', $this->column);
    
        $this->set('business_purpose_list', $this->business_purpose_list);

    }
    
    
    public function pr_view($id = null){

        if($id != null){
            
            $user_id = $this->Auth->user('id');
            
            $board = $this->Board->read(null, $id);
            
            
            
            //投稿者フラグ
            $post_flag = $this->Board->find('count',
                    array('conditions' => 
                array('Board.id' => $id,
                'Board.user_id' => $user_id)));
            
            //画像存在フラグ
            $img_flag = $this->BoardImage->find('count',
                    array('conditions' => array('BoardImage.board_id' => $id)));
            
            
            $this->set('img_flag', $img_flag);
            
            $this->set('post_flag', $post_flag);
            
            
            $this->set('business_purpose_list', $this->business_purpose_list);
            
            $this->set('column', $this->column);
            
            $this->set("board", $board);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }
    
    
    //投稿の削除
    public function pr_delete($id = null){
        
        if($id != null && $this->request->isPost()){
            
            $this->Board->id = $id;
            
            $this->request->data['Board']['id'] = $id;
            
            if($this->Board->exists()){
                
                if($this->Board->saveField('delete_flag', 1)){
                    
                    $this->Flash->set(self::DELETE_SUCCESS);
                    
                    $this->redirect("pr_search");
                    
                }else{
                    
                    $this->Flash->set(self::DELETE_FAILD);
                    
                    $this->redirect("pr_search");
                    
                }
                
                
            }else{
                     
               $this->redirect("index"); 
                
            }
            
            
        }else{
            
            $this->redirest("index");
            
            
        }

        
    }
    
    

//Controller : Boards,boards
//Model : Board,board

    public function index(){

        $boards = $this->paginate();

        $this->set("boards", $boards);
        
        //承認の是非
        $app_status = array("未承認", "承認済");
        
        //削除の是非
        $delete_status = array('未削除', '削除済');
        
        //承認・削除の状態
        $app_delete_status = array(
            0 => 
                 array(0 => '承認待ち', 
                       1 =>'承認前に削除'),
            1 => array(0 => "公開中",
                       1 => "投稿者により削除"));
        
        
        $this->set('column', $this->column);
        
        $this->set('app_status', $app_status);
        
        $this->set('delete_status', $delete_status);
        
        $this->set('app_delete_status', $app_delete_status);
        
        $this->set('business_purpose_list', $this->business_purpose_list);
        
        $this->set('user_list', $this->user_list);
        

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->Board->save($this->request->data)){
                
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
                
                $this->Board->id = $id;
                
                
                
                if($this->Board->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $board = $this->Board->read(null, $id);
            
            $this->request->data = $board;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $user_id = $this->Auth->user('id');
            
            $board = $this->Board->read(null, $id);
            
            
            
            //画像存在フラグ
            $img_flag = $this->BoardImage->find('count',
                    array('conditions' => array('BoardImage.board_id' => $id)));
            
            
            $this->set('img_flag', $img_flag);
            
            
            $this->set('business_purpose_list', $this->business_purpose_list);
            
            $this->set('column', $this->column);
            
            $this->set("board", $board);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }
    

    

    public function search(){

    $options = array();
	$searchword = array();
	
	if(!empty($this->data) || count($this->passedArgs) > 0){
		
		if(!isset($this->request->data['clear'])){
			
			//search on clicked
			if(isset($this->request->data['search'])){
			
			$searchword = $this->request->data["Board"];
				
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
				
			$this->request->data['Board'] = $searchword;
			
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
		$boards = $this->paginate($options);

		$this->set("boards", $boards);


    }

    
    //投稿の承認
    public function app($id = null){
        
        
        if($id != null && $this->request->isPost()){
            
            $this->Board->id = $id;
            
            $this->request->data['Board']['id'] = $id;
            
            if($this->Board->exists()){
                
                if($this->Board->saveField('app_flag', 1)){
                    
                    $this->Flash->set(self::APP_SUCCESS);
                    
                    $this->redirect("index");
                    
                }else{
                    
                    $this->Flash->set(self::APP_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }else{
                     
               $this->redirect("index"); 
                
            }
            
            
        }else{
            
            $this->redirect("index");
            
            
        }

        
        
        
    }


    //投稿の削除
    public function delete($id = null){
        
        
        if($id != null && $this->request->isPost()){
            
            $this->Board->id = $id;
            
            $this->request->data['Board']['id'] = $id;
            
            if($this->Board->exists()){
                
                if($this->Board->saveField('delete_flag', 1)){
                    
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


}
