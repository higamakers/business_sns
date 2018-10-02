<?php
/**
 * Check Fixture
 */
class CheckFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'check_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'purpose' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flag' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'check_user_id' => 1,
			'purpose' => 'Lorem ipsum dolor sit amet',
			'delete_flag' => 1,
			'created_at' => '2018-10-03 00:10:06',
			'updated_at' => '2018-10-03 00:10:06'
		),
	);

}
