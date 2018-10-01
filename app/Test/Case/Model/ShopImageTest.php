<?php
App::uses('ShopImage', 'Model');

/**
 * ShopImage Test Case
 */
class ShopImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shop_image',
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
		$this->ShopImage = ClassRegistry::init('ShopImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShopImage);

		parent::tearDown();
	}

}
