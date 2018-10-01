<?php
/**
 * Controller bake template file
 *
 * Allows templating of Controllers generated from bake.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.classes
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

echo "<?php\n";
echo "App::uses('{$plugin}AppController', '{$pluginPath}Controller');\n";
?>
/**
 * <?php echo $controllerName; ?> Controller
<?php
if (!$isScaffold) {
	$defaultModel = Inflector::singularize($controllerName);
	echo " *\n";
	echo " * @property {$defaultModel} \${$defaultModel}\n";
	if (!empty($components)) {
		foreach ($components as $component) {
			echo " * @property {$component}Component \${$component}\n";
		}
	}
}
?>
 */
class <?php echo $controllerName; ?>Controller extends <?php echo $plugin; ?>AppController {

<?php if ($isScaffold): ?>

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

<?php 
$modelName = Inflector::singularize($controllerName);
$lc_controllerName = lcfirst($controllerName);
$lc_modelName = lcfirst($modelName);
?>

<?php echo "//Controller : ".$controllerName.",".$lc_controllerName."\n"; ?>
<?php echo "//Model : ".$modelName.",".$lc_modelName; ?>


    public function index(){

        $<?php echo $lc_controllerName; ?> = $this->paginate();

        $this->set("<?php echo $lc_controllerName; ?>", $<?php echo $lc_controllerName; ?>);

    }


    public function add(){

        if($this->request->isPost()){//POST
            
            if($this-><?php echo $modelName; ?>->save($this->request->data)){
                
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
                
                $this-><?php echo $modelName; ?>->id = $id;
                
                
                
                if($this-><?php echo $modelName; ?>->save($this->request->data)){
                    
                    $this->Flash->set(self::EDIT_SUCCESS);
                    
                    $this->redirect("index");
                    
                    
                }else{
                    
                    
                    $this->Flash->set(self::EDIT_FAILD);
                    
                    $this->redirect("index");
                    
                }
                
                
            }
            //GET
            $<?php echo $lc_modelName; ?> = $this-><?php echo $modelName; ?>->read(null, $id);
            
            $this->request->data = $<?php echo $lc_modelName; ?>;
            
            
        }else{
            
            $this->redirect("index");
            
        }


    }

    public function view($id = null){

        if($id != null){
            
            $<?php echo $lc_modelName; ?> = $this-><?php echo $modelName; ?>->read(null, $id);
            
            $this->set("<?php echo $lc_modelName; ?>", $<?php echo $lc_modelName; ?>);
            
            
            
        }else{
            
            
            $this->redirect("index");
            
        }

    }

    public function delete(){

        if($id != null && $this->request->isPost()){
            
            $this-><?php echo $modelName; ?>->id = $id;
            
            if($this-><?php echo $modelName; ?>->exists()){
                
                if($this-><?php echo $modelName; ?>->delete()){
                    
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
			
			$searchword = $this->request->data["<?php echo $modelName; ?>"];
				
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
				
			$this->request->data['<?php echo $modelName; ?>'] = $searchword;
			
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
		$<?php echo $lc_controllerName; ?> = $this->paginate($options);

		$this->set("<?php echo $lc_controllerName; ?>", $<?php echo $lc_controllerName; ?>);


    }




<?php else:

	if (count($helpers)):
		echo "/**\n * Helpers\n *\n * @var array\n */\n";
		echo "\tpublic \$helpers = array(";
		for ($i = 0, $len = count($helpers); $i < $len; $i++):
			if ($i != $len - 1):
				echo "'" . Inflector::camelize($helpers[$i]) . "', ";
			else:
				echo "'" . Inflector::camelize($helpers[$i]) . "'";
			endif;
		endfor;
		echo ");\n\n";
	endif;

	if (count($components)):
		echo "/**\n * Components\n *\n * @var array\n */\n";
		echo "\tpublic \$components = array(";
		for ($i = 0, $len = count($components); $i < $len; $i++):
			if ($i != $len - 1):
				echo "'" . Inflector::camelize($components[$i]) . "', ";
			else:
				echo "'" . Inflector::camelize($components[$i]) . "'";
			endif;
		endfor;
		echo ");\n\n";
	endif;

	if (!empty($actions)) {
		echo trim($actions) . "\n";
	}

endif; ?>
}
