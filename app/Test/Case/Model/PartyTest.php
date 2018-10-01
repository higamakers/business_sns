<?php
App::uses('Party', 'Model');

/**
 * Party Test Case
 */
class PartyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.party',
		'app.shop',
		'app.pref',
		'app.city',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.business_status',
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
		$this->Party = ClassRegistry::init('Party');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Party);

		parent::tearDown();
	}

}
