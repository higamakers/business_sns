<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property BusinessCategory $BusinessCategory
 * @property BusinessPurpose $BusinessPurpose
 * @property Age $Age
 * @property Pref $Pref
 * @property City $City
 * @property Entry $Entry
 */
class User extends AppModel {

    
    public $actsAs = array(
    'Upload.Upload' => array(
    
        'thumbnail_url' => array(
                    'pathMethod' => 'flat',//保存用ディレクトリを用意しない
                    "thumbnailMethod" => "imagick",
                    "thumbnailSizes" => array(
                    "thumb80" => "80x80",
                    "thumb150" => "150x150"),//x
                    "thumbnailPath" => "webroot/img/thumbnail",
            
                'mimetypes' => array('image/jpeg', 'image/gif', 'image/png'),
                'extensions' => array('jpg', 'jpeg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'),
                'maxSize' => 2097152, //"2M
    )));

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
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		//email
        'username' => array(
            "notEmpty" => array(
                'rule' => 'notBlank',
                'required' => true,
				'allowEmpty' => false,
                'on' => 'create',
                'last' => true,
            ),
        "email" => array(
                //trueでドメインの有無を確認
				'rule' => array('email', true),
				'message' => '無効なメールアドレスです。',
				'allowEmpty' => true,
				'required' => false,
				'last' => true,
                'on' => null,
		),
        "unique" => array(
                //一意かどうか
                'rule' => 'isUnique', 
                'message' => '入力されたメールアドレスは既に登録されています'
            ) ,
        
        
        ),//username
        
        //password
        'password' => array(
			  "notEmpty" => array(
                'rule' => 'notBlank',
                'required' => true,
				'allowEmpty' => false,
                'on' => 'create',
                'last' => true,
            ),
			"password_ptx" => array(
                //trueでドメインの有無を確認
				'rule' => "/^[a-zA-Z0-9]{6,20}+$/",
				'message' => 'パスワードは6文字以上20文字以内で入力してください。',
				'allowEmpty' => true,
				'required' => false,
				'last' => true,
                'on' => null,
		),
            ),//password
        
        'thumbnail_url' => array(
             
            "fileCompleted" => array(
             "rule" => 'isCompletedUpload',
             "message" => 'ファイルが正常にアップロードされませんでした。',
             "on" => 'update'
            ),
            "fileEmpty" => array(
             "rule" => 'isFileUpload',
             "message" => 'ファイルが見つかりません',
             "on" => 'update'
            ),
            "mimeError" =>array(
             "rule" => array('isValidMimeType',
                             array(
                                 'image/jpeg', 'image/png', 
                                 'image/gif')),
             "message" => 'MimeTypeを確認してください',
             "on" => 'update'
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
             "message" => '拡張子を確認してください',
             "on" => 'update'
            ),
            
        
        
        )//thumbnail_url
    
        
	);//validation end



	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BusinessCategory' => array(
			'className' => 'BusinessCategory',
			'foreignKey' => 'business_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BusinessPurpose' => array(
			'className' => 'BusinessPurpose',
			'foreignKey' => 'business_purpose_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BusinessStatus' => array(
			'className' => 'BusinessStatus',
			'foreignKey' => 'business_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Age' => array(
			'className' => 'Age',
			'foreignKey' => 'age_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pref' => array(
			'className' => 'Pref',
			'foreignKey' => 'pref_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Entry' => array(
			'className' => 'Entry',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


    
    public function beforeSave($options = array()){
        
        if(empty($this->data[$this->alias]['id'])){
            //add action
            
            //権限
            $this->data[$this->alias]['role'] = 0;
            
            //defaultのサムネイル画像
            $this->data[$this->alias]['thumbnail_url'] = "default.jpg";
            
            $this->data[$this->alias]['created_at'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
            
         }else{
            //edit action
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
            
            
            
        }
            return true;
    }
    
    
    
    
    //本登録用hashメソッド
    public function getActivationHash() {
    
      
    // ユーザIDの有無確認
    if (!isset($this->id)) {
        return false;
    }
    // 更新日時をハッシュ化
    return Security::hash( $this->field('created_at'), 'md5', true);
    }
    
    

}
