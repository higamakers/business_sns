<?php
App::uses('AppController', 'Controller');
/**
 * Checks Controller
 */
class ChecksController extends AppController {

    
    
    public $components = array('Auth' => array('authorize' => array('Controller') )
                              );

    const ADD_SUCCESS = "保存に成功しました。";
    const ADD_FAILD = "保存に失敗しました。";
    const EDIT_SUCCESS = "編集に成功しました。";
    const EDIT_FAILD = "編集に失敗しました。";
    const DELETE_SUCCESS = "削除に成功しました。";
    const DELETE_FAILD = "削除に失敗しました。";
    
    
    protected $column = array('purpose' => 'メモ');

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
  
        
    
       
	if($this->action === 'check_user'){ return true; }
        
    

    
	return parent::isAuthorized($user);

    }//isAuthorized
    
    
    public function check_user(){
        
        $user_id = $this->Auth->user('id');
        
        $other_user_id = $this->params['url']['other_user'];
        
        //以前のチェックデータがあるかどうか？
         $before_check_status = $this->params['url']['before_check_status'];
        
        
        
        
        if($other_user_id != null){
            
            
            
            if($this->request->isPost()){
                
                
                $this->request->data['Check']['user_id'] = $user_id;
                
                $this->request->data['Check']['check_user_id'] = $other_user_id;
                
                
                if($before_check_status == 0){
                //新規の場合
                
                
                }else{
               //以前チェックデータがあった場合
                $before_check = $this->Check->find('first',
                    array("conditions" =>array('Check.user_id' => $user_id,
                'Check.check_user_id' =>$other_user_id)));
                
                
                $this->Check->id = $before_check['Check']['id'];
                   
                //これにより更新とする
                $this->request->data['Check']['id'] = $before_check['Check']['id'];
                    
                //delete_flagを0に
                $this->request->data['Check']['delete_flag'] = 0;
                
           
            }
            
            //保存処理(更新の場合は、Update)
            if($this->Check->save($this->request->data)){
                    
                    $this->Flash->set(self::ADD_SUCCESS);
            
                    $this->redirect(
                array('controller' => "Users",
                     'action' => 'profile_view', $other_user_id)); 
                    
                }else{
                    
                    $this->Flash->set(self::ADD_FAILD);
            
                    
                   $this->redirect(
                array('controller' => "Users",
                     'action' => 'mypage')); 
                    
                }
            
            
            
            }
            //GET
            
            $this->set('column', $this->column);
            
            
        
        }else{
            
            
            $this->redirect(
                array('controller' => "Users",
                     'action' => 'mypage'));
            
        }
        
        
    }
    
    
    public function check_out($id = null){
        
        $user_id = $this->Auth->user("id");
    
        
        
        if($id != null && $this->request->isPost()){
            
            $other_user_id = $id;
            
            $check = $this->Check->find('first',
                    array("conditions" =>array('Check.user_id' => $user_id,
                'Check.check_user_id' =>$other_user_id)));
            
            
            
            $this->Check->id = $check['Check']['id'];
            
            $this->request->data['Check']['id'] = $check['Check']['id'];
            
            
            
            if($this->Check->exists()){
                
                //論理削除フラグを１に
                if($this->Check->saveField("delete_flag", 1)){
                    
                    $this->Flash->set(self::DELETE_SUCCESS);
                    
                    $this->redirect(
                array('controller' => "Users",
                     'action' => 'profile_view', $other_user_id));
                    
                }else{
                    
                    $this->Flash->set(self::DELETE_FAILD);
                    
                    $this->redirect(
                array('controller' => "Users",
                     'action' => 'profile_view', $other_user_id));
                    
                }
                
                
            }else{
                     
               $this->redirect(
                array('controller' => "Users",
                     'action' => 'mypage')); 
                
            }
            
            
        }else{
            
            $this->redirect(
                array('controller' => "Users",
                     'action' => 'mypage')); 
            
            
        }

        
    }



//Controller : Checks,checks
//Model : Check,check

    public function index(){

        $checks = $this->paginate();

        $this->set("checks", $checks);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->Check->save($this->request->data)){
                
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
                
                $this->Check->id = $id;
                
                
                
                if($this->Check->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $check = $this->Check->read(null, $id);
            
            $this->request->data = $check;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $check = $this->Check->read(null, $id);
            
            $this->set("check", $check);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this->Check->id = $id;
            
            if($this->Check->exists()){
                
                if($this->Check->delete()){
                    
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
			
			$searchword = $this->request->data["Check"];
				
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
				
			$this->request->data['Check'] = $searchword;
			
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
		$checks = $this->paginate($options);

		$this->set("checks", $checks);


    }




}
