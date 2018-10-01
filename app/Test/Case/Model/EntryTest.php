<?php
App::uses('Entry', 'Model');

/**
 * Entry Test Case
 */
class EntryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entry',
		'app.party',
		'app.shop',
		'app.pref',
		'app.city',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.business_status',
		'app.age'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Entry = ClassRegistry::init('Entry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entry);

		parent::tearDown();
	}

}
