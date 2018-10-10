<?php
App::uses('BoardComment', 'Model');

/**
 * BoardComment Test Case
 */
class BoardCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.board_comment',
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
		'app.board_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BoardComment = ClassRegistry::init('BoardComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BoardComment);

		parent::tearDown();
	}

}
