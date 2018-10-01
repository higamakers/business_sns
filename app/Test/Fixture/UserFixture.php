<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'site_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'business_category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'business_small_category' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'business_pr' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'business_purpose_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'age_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'manager_flag' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'completed_flag' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'registr_flag' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'role' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'password' => 'Lorem ipsum dolor sit amet',
			'nickname' => 'Lorem ipsum dolor sit amet',
			'company_name' => 'Lorem ipsum dolor sit amet',
			'site_url' => 'Lorem ipsum dolor sit amet',
			'business_category_id' => 1,
			'business_small_category' => 'Lorem ipsum dolor sit amet',
			'business_pr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'business_purpose_id' => 1,
			'age_id' => 1,
			'pref_id' => 1,
			'city_id' => 1,
			'manager_flag' => 1,
			'completed_flag' => 1,
			'registr_flag' => 1,
			'role' => 1,
			'created_at' => '2018-09-16 23:41:43',
			'updated_at' => '2018-09-16 23:41:43'
		),
	);

}
