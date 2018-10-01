<?php
App::uses('City', 'Model');

/**
 * City Test Case
 */
class CityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.city',
		'app.pref',
		'app.shop',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.age',
		'app.entry'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->City = ClassRegistry::init('City');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->City);

		parent::tearDown();
	}

}
