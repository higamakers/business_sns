<?php
App::uses('AppModel', 'Model');
/**
 * Party Model
 *
 * @property Shop $Shop
 * @property Entry $Entry
 */
class Party extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'end_flag' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Entry' => array(
			'className' => 'Entry',
			'foreignKey' => 'party_id',
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


    public function beforeSave($options = array()){
        
        if(empty($this->data[$this->alias]['id'])){
            //add action
            $this->data[$this->alias]['created_at'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
            
            $this->data[$this->alias]['year_month_day'] = $this->year_month_day($this->data[$this->alias]);
            
            
            
            
            
         }else{
            //edit action
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
            
            $this->data[$this->alias]['year_month_day'] = $this->year_month_day($this->data[$this->alias]);
            
        }
            return true;
    }

    
    public function year_month_day($data = array()){
        
        $year = $data['year'];
        
        $month = $data['month'];
        
        
        if($month >= 10){
            
            $month = '0'.$month;
            
        }
        
        $day = $data['day'];
        
        $start_time = $data['start_time'];
        
        $year_month_day = $year.'-'.$month.'-'.$day.' '.$start_time;
        
        return $year_month_day;
        
        
        
    }
    

}
