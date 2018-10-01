<?php
App::uses('AppModel', 'Model');
/**
 * ShopImage Model
 *
 * @property Shop $Shop
 */
class ShopImage extends AppModel {

    
    
    
    public $actsAs = array(
    'Upload.Upload' => array(
    
        'shop_img_url' => array(
                    'pathMethod' => 'flat',//保存用ディレクトリを用意しない
                    "thumbnailMethod" => "imagick",
                    "thumbnailSizes" => array(
                    "thumb80" => "80x80",
                    "thumb150" => "150x150"),//x
                    "thumbnailPath" => "webroot/img/shop_img",
            
                'mimetypes' => array('image/jpeg', 'image/gif', 'image/png'),
                'extensions' => array('jpg', 'jpeg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'),
                'maxSize' => 2097152, //"2M
    )));

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'shop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
	*
	* $validate = array(
	*	
	*	'fieldsname' => array('rulename' => array('rule' => 'rulename',
	*									    'required' => ture or false,
	*									    'allowEmpty' => ture or false,
	*										'message' => 'message',
    'on' => 'create' or 'update'
	*									   ),
	*
	*/
	
    
    public $validate = array(
        'shop_img_url' => array(
             
            "fileCompleted" => array(
             "rule" => 'isCompletedUpload',
             "message" => 'ファイルが正常にアップロードされませんでした。'
            ),
            "fileEmpty" => array(
             "rule" => 'isFileUpload',
             "message" => 'ファイルが見つかりません',
             "on" => 'create'
            ),
            "mimeError" =>array(
             "rule" => array('isValidMimeType',
                             array(
                                 'image/jpeg', 'image/png', 
                                 'image/gif')),
             "message" => 'MimeTypeを確認してください'
            ),
            "fileSizeError" =>array(
             "rule" => array('isBelowMaxSize',2097152),
             "message" => 'ファイルが大きすぎます'
            ),
            "extensionError" =>array(
             "rule" => array('isValidExtension',array(
                 'png', 
                 'jpg',
                 'jpeg',
                 'gif')),
             "message" => '拡張子を確認してください'
            ),
            
        
        
        )//shop_img_url
        );
	
	/**
	*
	* array('rule' => array('orginalValidate', 'param1', 'param2');
	*
	* $data = $this->request->data
	* $this->alias = ModelName
	*
	* public function orginalValidate($data, $param1, $param2){}
	*
	*/    


    public function beforeSave($options = array()){
        
        if(empty($this->data[$this->alias]['id'])){
            //add action
            $this->data[$this->alias]['created_at'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
         }else{
            //edit action
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
            
        }
            return true;
    }

    

}
