<?php
App::uses('BusinessStatus', 'Model');

/**
 * BusinessStatus Test Case
 */
class BusinessStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business_status',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.age',
		'app.pref',
		'app.city',
		'app.shop',
		'app.entry'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessStatus = ClassRegistry::init('BusinessStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessStatus);

		parent::tearDown();
	}

}
