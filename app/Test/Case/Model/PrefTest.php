<?php
App::uses('Pref', 'Model');

/**
 * Pref Test Case
 */
class PrefTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pref',
		'app.city',
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
		$this->Pref = ClassRegistry::init('Pref');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pref);

		parent::tearDown();
	}

}
