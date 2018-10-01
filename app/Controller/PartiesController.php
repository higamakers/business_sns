<?php
App::uses('AppController', 'Controller');
/**
 * Parties Controller
 */
class PartiesController extends AppController {

    
    
    public $helper = array('Party', 'Profile');
    
    public $uses = array('Party','Shop', 'Entry', 'User');
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );


    const ADD_SUCCESS = "保存に成功しました。";
    const ADD_FAILD = "保存に失敗しました。";
    const EDIT_SUCCESS = "編集に成功しました。";
    const EDIT_FAILD = "編集に失敗しました。";
    const DELETE_SUCCESS = "削除に成功しました。";
    const DELETE_FAILD = "削除に失敗しました。";
    
    
    
    //リストを定義
    
    public $today;
    
    public $month_list;
    
    public $day_list;
    
    public $shop_list;
    
    
    function __construct($request, $response){
    
        
        
        
        for($i = 1; $i <= 12; $i++){
            
            $this->month_list[$i] = $i;
        }
        
        
        $this->this_month = date('m');
        
        for($i = 1; $i <= 31; $i++){
            
            $this->day_list[$i] = $i;
            
        }
        
        $this->today = array('Party' => 
                             array('year' => date('Y'),
                                  'month' => date('m'),
                                  'day' => date('d'),
                            'start_time' => '19:00:00',
                            'end_time' =>'21:00:00',
                                  'price' => 3000));
        
      
        
        $this->shop_list = $this->Shop->find('list',
                                             array('fields' => 'shop_name'));
        
        
        
        
        parent::__construct($request, $response);


    }
    
    

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
        
    if($this->action === 'party_list'){ return true; }
        
    if($this->action === 'party_detail'){ return true; }

    
	return parent::isAuthorized($user);

    }//isAuthorized

    public function party_list(){
        
        
        
        $parties = $this->paginate();

        $this->set("parties", $parties);
        
        
        $this->set('shop_list', $this->shop_list);
        
    }
    
    public function party_detail($id = null){
        
        $user_id = $this->Auth->user('id');
        
        
        
        
        if($id != null){
            
            $party = $this->Party->read(null, $id);
            
            
            
            $entry_flag = $this->Entry->find('count',
                array('conditions' => array(
                    'party_id' => $id,
                    'user_id' => $user_id,
                    'delete_flag' => 0)));
            
            //参加者一覧を取得
            $entry_lists = $this->Entry->find('all',
                array('conditions' => array(
                    'party_id' => $id,
                    'delete_flag' => 0)));
            
            
            
            
            $this->set("entry_flag", $entry_flag);
            
            $this->set("entry_lists", $entry_lists);
            
            $this->set("party", $party);
            
            
            
        }else{
            
            
            $this->redirect("party_list");
            
        }
        
        
    }

    
    
    
    
    
/////////////////////////////////////////////////////////    
    
//Controller : Parties,parties
//Model : Party,party

    public function index(){

        $parties = $this->paginate();

        $this->set("parties", $parties);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->Party->save($this->request->data)){
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect("index");
                
                
                
            }else{
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET
        
        
        $this->request->data = $this->today;
        
        $this->set('month_list', $this->month_list);
        
        $this->set('day_list', $this->day_list);
        
        $this->set('shop_list', $this->shop_list);
        
        
        

    }

    public function edit($id = null){

        if($id != null){
            
                
            if($this->request->isPost()){//POST
                
                $this->Party->id = $id;
                
                $this->request->data['Party']['id'] = $id; 
                
                
                if($this->Party->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            
            $this->set('month_list', $this->month_list);
        
        $this->set('day_list', $this->day_list);
        
        $this->set('shop_list', $this->shop_list);
            
            
            $party = $this->Party->read(null, $id);
            
            $this->request->data = $party;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $party = $this->Party->read(null, $id);
            
            $this->set("party", $party);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->Party->id = $id;
            
            if($this->Party->exists()){
                
                if($this->Party->delete()){
                    
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
			
			$searchword = $this->request->data["Party"];
				
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
				
			$this->request->data['Party'] = $searchword;
			
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
		$parties = $this->paginate($options);

		$this->set("parties", $parties);


    }




}
