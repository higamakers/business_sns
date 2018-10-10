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
    
    function __construct($request, $response){ 
        
        //各リストを取得
       $this->business_purpose_list = $this->BusinessPurpose->find('list', array('fields' => 'business_purpose_name'));
            
        
        parent::__construct($request, $response);
    }
    
    public $column = 
        array('business_purpose_id' => 'カテゴリー',
              'title' => 'タイトル',
              'content' => '内容');

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
    
    

//Controller : Boards,boards
//Model : Board,board

    public function index(){

        $boards = $this->paginate();

        $this->set("boards", $boards);

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
            
            $board = $this->Board->read(null, $id);
            
            $this->set("board", $board);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->Board->id = $id;
            
            if($this->Board->exists()){
                
                if($this->Board->delete()){
                    
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




}
