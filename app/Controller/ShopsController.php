<?php
App::uses('AppController', 'Controller');
/**
 * Shops Controller
 */
class ShopsController extends AppController {

    
    public $uses = array('Shop', 'Pref', 'User');
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );

    
    
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
  
        
    
	return parent::isAuthorized($user);

    }//isAuthorized




//Controller : Shops,shops
//Model : Shop,shop

    public function index(){

        $shops = $this->paginate();
        
        $pref_list = $this->Pref->find('list', array('fields' => 'pref_name'));

        $this->set('pref_list', $pref_list);

        $this->set("shops", $shops);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->Shop->save($this->request->data)){
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect("index");
                
                
                
            }else{
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET
        
        $pref_list = $this->Pref->find('list', array('fields' => 'pref_name'));

        $this->set('pref_list', $pref_list);
        
    }

    public function edit($id = null){

        if($id != null){
            
                
            if($this->request->isPost()){//POST
                
                $this->Shop->id = $id;
                
                
                
                if($this->Shop->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $shop = $this->Shop->read(null, $id);
            
            
            $pref_list = $this->Pref->find('list', array('fields' => 'pref_name'));

        $this->set('pref_list', $pref_list);
            
            $this->request->data = $shop;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $shop = $this->Shop->read(null, $id);
            
            $this->set("shop", $shop);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->Shop->id = $id;
            
            if($this->Shop->exists()){
                
                if($this->Shop->delete()){
                    
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
			
			$searchword = $this->request->data["Shop"];
				
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
				
			$this->request->data['Shop'] = $searchword;
			
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
		$shops = $this->paginate($options);

		$this->set("shops", $shops);


    }




}
