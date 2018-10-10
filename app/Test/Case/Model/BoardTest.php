<?php
App::uses('Board', 'Model');

/**
 * Board Test Case
 */
class BoardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.board',
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
		'app.board_comment',
		'app.board_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Board = ClassRegistry::init('Board');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Board);

		parent::tearDown();
	}

}
