<?php
App::uses('Shop', 'Model');

/**
 * Shop Test Case
 */
class ShopTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shop',
		'app.pref',
		'app.city',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.business_status',
		'app.age',
		'app.entry',
		'app.party'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Shop = ClassRegistry::init('Shop');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shop);

		parent::tearDown();
	}

}
