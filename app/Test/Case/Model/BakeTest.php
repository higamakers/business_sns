<?php
App::uses('Bake', 'Model');

/**
 * Bake Test Case
 */
class BakeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bake'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bake = ClassRegistry::init('Bake');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bake);

		parent::tearDown();
	}

}
