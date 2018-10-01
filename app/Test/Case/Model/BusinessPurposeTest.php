<?php
App::uses('BusinessPurpose', 'Model');

/**
 * BusinessPurpose Test Case
 */
class BusinessPurposeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business_purpose',
		'app.user',
		'app.business_category',
		'app.age',
		'app.pref',
		'app.city',
		'app.entry'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessPurpose = ClassRegistry::init('BusinessPurpose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessPurpose);

		parent::tearDown();
	}

}
