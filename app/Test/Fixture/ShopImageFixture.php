<?php
/**
 * ShopImage Fixture
 */
class ShopImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'shop_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'shop_img_url' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'size' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'shop_id' => 1,
			'shop_img_url' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 1,
			'created_at' => '2018-09-24 12:41:03',
			'updated_at' => '2018-09-24 12:41:03'
		),
	);

}
