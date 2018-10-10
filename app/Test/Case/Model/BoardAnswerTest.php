<?php
App::uses('BoardAnswer', 'Model');

/**
 * BoardAnswer Test Case
 */
class BoardAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.board_answer',
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
		'app.board_image',
		'app.board_question',
		'app.post_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BoardAnswer = ClassRegistry::init('BoardAnswer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BoardAnswer);

		parent::tearDown();
	}

}
