<?php
App::uses('ProfileImage', 'Model');

/**
 * ProfileImage Test Case
 */
class ProfileImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.profile_image',
		'app.user',
		'app.business_category',
		'app.business_purpose',
		'app.age',
		'app.pref',
		'app.city',
		'app.shop',
		'app.entry'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProfileImage = ClassRegistry::init('ProfileImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProfileImage);

		parent::tearDown();
	}

}
