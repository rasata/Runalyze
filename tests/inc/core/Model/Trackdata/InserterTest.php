<?php

namespace Runalyze\Model\Trackdata;

use PDO;

class InvalidInserterObjectForTrackdata_MockTester extends \Runalyze\Model\Entity {
	public function properties() {
		return array('foo');
	}
}

/**
 * Generated by hand
 */
class InserterTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var \PDO
	 */
	protected $PDO;

	protected function setUp() {
		$this->PDO = new PDO('sqlite::memory:');
		$this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->PDO->exec('CREATE TABLE IF NOT EXISTS `'.PREFIX.'trackdata` (
			`accountid` int(10),
			`activityid` int(10),
			`time` longtext NOT NULL,
			`distance` longtext NOT NULL,
			`heartrate` longtext NOT NULL,
			`cadence` longtext NOT NULL,
			`power` longtext NOT NULL,
			`temperature` longtext NOT NULL,
			`groundcontact` longtext NOT NULL,
			`vertical_oscillation` longtext NOT NULL,
			`groundcontact_balance` LONGTEXT NOT NULL,
			`pauses` text NOT NULL,
			PRIMARY KEY (`activityid`)
			);
		');
	}

	protected function tearDown() {
		$this->PDO->exec('DROP TABLE `'.PREFIX.'trackdata`');
	}

	public function testWrongObject() {
	    if (PHP_MAJOR_VERSION >= 7) $this->setExpectedException('TypeError'); else $this->setExpectedException('\PHPUnit_Framework_Error');
		new Inserter($this->PDO, new InvalidInserterObjectForTrackdata_MockTester);
	}

	public function testSimpleInsert() {
		$T = new Entity(array(
			Entity::ACTIVITYID => 1,
			Entity::TIME => array(20, 40, 60),
			Entity::DISTANCE => array(0.1, 0.2, 0.3),
			Entity::HEARTRATE => array(100, 120, 130)
		));
		$T->pauses()->add(new Pause(40, 10));

		$I = new Inserter($this->PDO, $T);
		$I->setAccountID(1);
		$I->insert();

		$data = $this->PDO->query('SELECT * FROM `'.PREFIX.'trackdata` WHERE `accountid`=1')->fetch(PDO::FETCH_ASSOC);
		$N = new Entity($data);

		$this->assertEquals(1, $N->activityID());
		$this->assertEquals(array(20, 40, 60), $N->time());
		$this->assertEquals(array(0.1, 0.2, 0.3), $N->distance());
		$this->assertEquals(array(100, 120, 130), $N->heartRate());

		$this->assertFalse($N->pauses()->isEmpty());
	}

}
