<?php
/**
 * BoardImage Fixture
 */
class BoardImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'board_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'board_img_url' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'size' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			
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
			'board_id' => 1,
			'board_img_url' => 'Lorem ipsum dolor sit amet',
			'type' => 1,
			'size' => 1,
			'created_at' => '2018-10-06 00:06:51',
			'updated_at' => '2018-10-06 00:06:51'
		),
	);

}
