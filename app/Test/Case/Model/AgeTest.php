<?php
App::uses('Age', 'Model');

/**
 * Age Test Case
 */
class AgeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.age',
		'app.user',
		'app.business_category',
		'app.business_purpose',
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
		$this->Age = ClassRegistry::init('Age');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Age);

		parent::tearDown();
	}

}
