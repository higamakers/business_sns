<?php
/**
 * Model template file.
 *
 * Used by bake to create new Model files.
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
echo "App::uses('{$plugin}AppModel', '{$pluginPath}Model');\n";
?>
/**
 * <?php echo $name ?> Model
 *
<?php
foreach (array('hasOne', 'belongsTo', 'hasMany', 'hasAndBelongsToMany') as $assocType) {
	if (!empty($associations[$assocType])) {
		foreach ($associations[$assocType] as $relation) {
			echo " * @property {$relation['className']} \${$relation['alias']}\n";
		}
	}
}
?>
 */
class <?php echo $name ?> extends <?php echo $plugin; ?>AppModel {

<?php if ($useDbConfig !== 'default'): ?>
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = '<?php echo $useDbConfig; ?>';

<?php endif;

if ($useTable && $useTable !== Inflector::tableize($name)):
	$table = "'$useTable'";
	echo "/**\n * Use table\n *\n * @var mixed False or table name\n */\n";
	echo "\tpublic \$useTable = $table;\n\n";
endif;

if ($primaryKey !== 'id'): ?>
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = '<?php echo $primaryKey; ?>';

<?php endif;

if ($displayField): ?>
/**
 * Display field
 *
 * @var string
 */
	public $displayField = '<?php echo $displayField; ?>';

<?php endif;

if (!empty($actsAs)): ?>
/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(<?php echo "\n\t"; foreach ($actsAs as $behavior): echo "\t"; var_export($behavior); echo ",\n\t"; endforeach; ?>);

<?php endif; ?>


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
                'rule' => 'notEmpty',
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
                'rule' => 'notEmpty',
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
	);


<?php

                                        
foreach ($associations as $assoc):
	if (!empty($assoc)):
?>

	// The Associations below have been created with all possible keys, those that are not needed can be removed
<?php
		break;
	endif;
endforeach;

foreach (array('hasOne', 'belongsTo') as $assocType):
	if (!empty($associations[$assocType])):
		$typeCount = count($associations[$assocType]);
		echo "\n/**\n * $assocType associations\n *\n * @var array\n */";
		echo "\n\tpublic \$$assocType = array(";
		foreach ($associations[$assocType] as $i => $relation):
			$out = "\n\t\t'{$relation['alias']}' => array(\n";
			$out .= "\t\t\t'className' => '{$relation['className']}',\n";
			$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
			$out .= "\t\t\t'conditions' => '',\n";
			$out .= "\t\t\t'fields' => '',\n";
			$out .= "\t\t\t'order' => ''\n";
			$out .= "\t\t)";
			if ($i + 1 < $typeCount) {
				$out .= ",";
			}
			echo $out;
		endforeach;
		echo "\n\t);\n";
	endif;
endforeach;

if (!empty($associations['hasMany'])):
	$belongsToCount = count($associations['hasMany']);
	echo "\n/**\n * hasMany associations\n *\n * @var array\n */";
	echo "\n\tpublic \$hasMany = array(";
	foreach ($associations['hasMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'dependent' => false,\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'exclusive' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t\t'counterQuery' => ''\n";
		$out .= "\t\t)";
		if ($i + 1 < $belongsToCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;

if (!empty($associations['hasAndBelongsToMany'])):
	$habtmCount = count($associations['hasAndBelongsToMany']);
	echo "\n/**\n * hasAndBelongsToMany associations\n *\n * @var array\n */";
	echo "\n\tpublic \$hasAndBelongsToMany = array(";
	foreach ($associations['hasAndBelongsToMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'joinTable' => '{$relation['joinTable']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'associationForeignKey' => '{$relation['associationForeignKey']}',\n";
		$out .= "\t\t\t'unique' => 'keepExisting',\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t)";
		if ($i + 1 < $habtmCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;
?>

    
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
