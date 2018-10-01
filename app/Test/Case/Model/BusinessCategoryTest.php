<?php
App::uses('BusinessCategory', 'Model');

/**
 * BusinessCategory Test Case
 */
class BusinessCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business_category',
		'app.user',
		'app.business_purpose',
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
		$this->BusinessCategory = ClassRegistry::init('BusinessCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessCategory);

		parent::tearDown();
	}

}
