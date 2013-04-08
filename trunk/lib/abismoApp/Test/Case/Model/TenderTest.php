<?php
App::uses('Tender', 'Model');

/**
 * Tender Test Case
 *
 */
class TenderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tender',
		'app.image',
		'app.project',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tender = ClassRegistry::init('Tender');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tender);

		parent::tearDown();
	}

}
