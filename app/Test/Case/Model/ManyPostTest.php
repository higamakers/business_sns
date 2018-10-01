<?php
App::uses('ManyPost', 'Model');

/**
 * ManyPost Test Case
 */
class ManyPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.many_post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ManyPost = ClassRegistry::init('ManyPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ManyPost);

		parent::tearDown();
	}

}
