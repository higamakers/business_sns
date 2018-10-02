<?php
App::uses('Check', 'Model');

/**
 * Check Test Case
 */
class CheckTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.check',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.business_status',
		'app.age',
		'app.pref',
		'app.city',
		'app.shop',
		'app.party',
		'app.entry',
		'app.check_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Check = ClassRegistry::init('Check');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Check);

		parent::tearDown();
	}

}
