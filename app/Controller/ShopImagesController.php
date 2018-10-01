<?php
App::uses('AppController', 'Controller');
/**
 * ShopImages Controller
 */
class ShopImagesController extends AppController {
    
    public $uses = array('ShopImage', 'Shop');
    
    public $helpers = array("Shop");
    
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



//Controller : ShopImages,shopImages
//Model : ShopImage,shopImage

    public function index(){

        $shopImages = $this->paginate();

        $shop_list = $this->Shop->find('list', array('fields' => 'shop_name'));
        
        $this->set('shop_list', $shop_list);
        
        $this->set("shopImages", $shopImages);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this->ShopImage->save($this->request->data)){
                
                $this->Flash->set(self::ADD_SUCCESS);
                
                $this->redirect("index");
                
                
                
            }else{
                
            //バリデーションエラーメッセージを表示する
            var_dump($this->User->validationErrors);
            
            
            $upload_errors = $this->User->validationErrors['thumbnail_url'][0];
            
            $this->set('upload_errors', $upload_errors);
                
                
                $this->Flash->set(self::ADD_FAILD);
                
            }
            
            
        }
        //GET
        
        $shop_list = $this->Shop->find('list', array('fields' => 'shop_name'));
        
        $this->set('shop_list', $shop_list);

    }

    public function edit($id = null){

        if($id != null){
            
                
            if($this->request->isPost() || $this->request->is("put")){//POST
                
                $this->ShopImage->id = $id;
                
                
                $this->request->data['ShopImage']['id'] = $id;
                
                
                if($this->ShopImage->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $shopImage = $this->ShopImage->read(null, $id);
            
            $this->request->data = $shopImage;
            
            
        }else{
            
            $this->redirect("index");
            
        }
        
        $shop_list = $this->Shop->find('list', array('fields' => 'shop_name'));
        
        $this->set('shop_list', $shop_list);


    }

    public function view($id = null){

        if($id != null){
            
            $shopImage = $this->ShopImage->read(null, $id);
            
            $this->set("shopImage", $shopImage);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete($id = null){

        if($id != null && $this->request->isPost()){
            
            $this->ShopImage->id = $id;
            
            if($this->ShopImage->exists()){
                
                if($this->ShopImage->delete()){
                    
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
			
			$searchword = $this->request->data["ShopImage"];
				
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
				
			$this->request->data['ShopImage'] = $searchword;
			
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
		$shopImages = $this->paginate($options);

		$this->set("shopImages", $shopImages);


    }




}
