<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2014-04-01 at 17:25:06.
 */
class ImporterFiletypeFITTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var ImporterFiletypeFIT
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new ImporterFiletypeFIT;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
	}

	/**
	 * @expectedException RuntimeException
	 */
	public function test_nonexistingFile() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('idontexist.fit');
		}
	}

	/**
	 * Test: standard file
	 * Filename: "Standard.fit" 
	 */
	public function test_generalFile() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/Standard.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals( 0*3600 + 53*60 + 06, $this->object->object()->getTimeInSeconds(), '', 30);
			$this->assertEquals( 1*3600 + 00*60 + 53, $this->object->object()->getElapsedTime() );
			$this->assertTrue( $this->object->object()->hasElapsedTime() );

			$this->assertEquals( 8.98, $this->object->object()->getDistance(), '', 0.1);
			$this->assertEquals( 305, $this->object->object()->getCalories(), '', 10);
			$this->assertEquals( 123, $this->object->object()->getPulseAvg(), '', 2);
			$this->assertEquals( 146, $this->object->object()->getPulseMax(), '', 2);
			$this->assertTrue( $this->object->object()->hasArrayAltitude() );
			$this->assertTrue( $this->object->object()->hasArrayDistance() );
			$this->assertTrue( $this->object->object()->hasArrayHeartrate() );
			$this->assertTrue( $this->object->object()->hasArrayLatitude() );
			$this->assertTrue( $this->object->object()->hasArrayLongitude() );
			$this->assertTrue( $this->object->object()->hasArrayTime() );
			$this->assertFalse( $this->object->object()->hasArrayGroundContact() );
			$this->assertFalse( $this->object->object()->hasArrayVerticalOscillation() );

			$this->assertEquals( 1, $this->object->object()->Sport()->id() );

			$this->assertFalse( $this->object->object()->Splits()->areEmpty() );
		}
	}

	/**
	 * Test: fenix file
	 * Filename: "Fenix-2.fit" 
	 */
	public function test_FenixFile() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/Fenix-2.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals( 16*60 + 15, $this->object->object()->getTimeInSeconds() );
			$this->assertEquals( 20*60 + 10, $this->object->object()->getElapsedTime() );
			$this->assertTrue( $this->object->object()->hasElapsedTime() );

			$this->assertEquals( 2.94, $this->object->object()->getDistance(), '', 0.1);
			$this->assertEquals( 159, $this->object->object()->getCalories(), '', 10);
			$this->assertEquals( 137, $this->object->object()->getPulseAvg(), '', 5);
			$this->assertEquals( 169, $this->object->object()->getPulseMax(), '', 5);
			$this->assertTrue( $this->object->object()->hasArrayAltitude() );
			$this->assertTrue( $this->object->object()->hasArrayDistance() );
			$this->assertTrue( $this->object->object()->hasArrayHeartrate() );
			$this->assertTrue( $this->object->object()->hasArrayLatitude() );
			$this->assertTrue( $this->object->object()->hasArrayLongitude() );
			$this->assertTrue( $this->object->object()->hasArrayTime() );
			$this->assertTrue( $this->object->object()->hasArrayTemperature() );
			$this->assertTrue( $this->object->object()->hasArrayGroundContact() );
			$this->assertTrue( $this->object->object()->hasArrayVerticalOscillation() );

			$this->assertEquals( 216, $this->object->object()->getGroundContactTime() );
			$this->assertEquals( 92, $this->object->object()->getVerticalOscillation(), '', 1 );

			$this->assertEquals( 1, $this->object->object()->Sport()->id() );

			$this->assertFalse( $this->object->object()->Splits()->areEmpty() );

			$this->assertEquals( 53, $this->object->object()->getFitVdotEstimate() );
			$this->assertEquals( 816, $this->object->object()->getFitRecoveryTime() );
			$this->assertEquals( 0, $this->object->object()->getFitHRVscore() );
		}
	}

	/**
	 * Test: fenix file
	 * Filename: "Fenix-2.fit" 
	 */
	public function test_FenixFileWithPauses() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/Fenix-2-pauses.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals( 46*60 + 50, $this->object->object()->getTimeInSeconds(), '', 5 );
			$this->assertEquals( 50*60 + 46, $this->object->object()->getElapsedTime() );
			$this->assertTrue( $this->object->object()->hasElapsedTime() );

			$this->assertEquals( 10.55, $this->object->object()->getDistance(), '', 0.1);
			$this->assertEquals( 564, $this->object->object()->getCalories(), '', 10);
			$this->assertEquals( 141, $this->object->object()->getPulseAvg(), '', 2);
			$this->assertEquals( 152, $this->object->object()->getPulseMax(), '', 2);
			$this->assertTrue( $this->object->object()->hasArrayAltitude() );
			$this->assertTrue( $this->object->object()->hasArrayDistance() );
			$this->assertTrue( $this->object->object()->hasArrayHeartrate() );
			$this->assertTrue( $this->object->object()->hasArrayLatitude() );
			$this->assertTrue( $this->object->object()->hasArrayLongitude() );
			$this->assertTrue( $this->object->object()->hasArrayTime() );
			$this->assertTrue( $this->object->object()->hasArrayTemperature() );

			$this->assertEquals( 1, $this->object->object()->Sport()->id() );

			$this->assertFalse( $this->object->object()->Splits()->areEmpty() );
			$this->assertEquals( "10.547|46:49", $this->object->object()->Splits()->asString() );

			$this->assertEquals( 46*60 + 50, $this->object->object()->getArrayTimeLastPoint(), '', 5 );

			$this->assertEquals( 65, $this->object->object()->getFitVdotEstimate() );
			$this->assertEquals( 932, $this->object->object()->getFitRecoveryTime() );
			$this->assertEquals( 0, $this->object->object()->getFitHRVscore() );
		}
	}

	/**
	 * Test: fenix file
	 * Filename: "Fenix-2.fit" 
	 */
	public function test_FenixFileNegativeTime() {
		if (!Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/Fenix-2-negative-times.fit');

			$this->assertFalse( $this->object->failed() );

			$this->assertEquals( "28.08.2014 09:32:59", date('d.m.Y H:i:s', $this->object->object()->getTimestamp()) );
			$this->assertEquals( 2*3600 + 35*60 + 21, $this->object->object()->getTimeInSeconds() );

			$this->assertTrue( $this->object->object()->hasArrayTime() );
			$this->assertTrue( min($this->object->object()->getArrayTime()) >= 0 );
		}
	}

	/**
	 * Test: ignore 'start' for events other than timer
	 */
	public function testOtherStartEvents() {
		if (!Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/FR920-additional-start-events.fit');

			$this->assertFalse( $this->object->failed() );
			$this->assertEquals( 2*3600 + 47*60 + 22, $this->object->object()->getTimeInSeconds() );

			$time = $this->object->object()->getArrayTime();
			$this->assertTrue( min($time) >= 0 );
			$this->assertEquals( 2*3600 + 47*60 + 22, end($time) );
		}
	}

	/**
	 * Test: multisession file
	 * Filename: "Multisession.fit" 
	 */
	public function testMultisession() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/Multisession.fit');

			$this->assertFalse( $this->object->failed() );
			$this->assertTrue( $this->object->hasMultipleTrainings() );

			$FirstSession = $this->object->object(0);
			$this->assertEquals('23.05.2015 12:52:35', date('d.m.Y H:i:s', $FirstSession->getTimestamp()));
			$this->assertEquals(1131, $FirstSession->getTimeInSeconds());
			$this->assertEquals(1173, $FirstSession->getElapsedTime());
			$this->assertEquals(4.111, $FirstSession->getDistance());

			$SecondSession = $this->object->object(1);
			$this->assertEquals('23.05.2015 14:31:29', date('d.m.Y H:i:s', $SecondSession->getTimestamp()));
			$this->assertEquals(1001, $SecondSession->getTimeInSeconds());
			$this->assertEquals(1118, $SecondSession->getElapsedTime());
			$this->assertEquals(3.746, $SecondSession->getDistance());
		}
	}

	/**
	 * Test: simple pauses
	 * Filename: "HRV-example.fit" 
	 */
	public function testSimplePauseExample() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/HRV-example.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals( 60, $this->object->object()->getTimeInSeconds() );
			$this->assertEquals( 60 + 69, $this->object->object()->getElapsedTime() );
			$this->assertTrue( $this->object->object()->hasElapsedTime() );

			$this->assertEquals( 72, $this->object->object()->getPulseAvg() );
			$this->assertEquals( 100, $this->object->object()->getPulseMax() );

			$Pauses = $this->object->object()->Pauses();
			$this->assertEquals( 1, $Pauses->num() );
			$this->assertEquals( 41, $Pauses->at(0)->time() );
			$this->assertEquals( 69, $Pauses->at(0)->duration() );
			$this->assertEquals( 100, $Pauses->at(0)->hrStart() );
			$this->assertEquals( 69, $Pauses->at(0)->hrEnd() );
		}
	}

	/**
	 * Test: simple swimming file (FR910xt)
	 * Filename: "swim-25m-lane.fit" 
	 */
	public function testSimpleSwimmingFile() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/swim-25m-lane.fit');

			$this->assertFalse($this->object->hasMultipleTrainings() );
			$this->assertFalse($this->object->failed() );

			$this->assertEquals('fr910xt', $this->object->object()->getCreator());
			$this->assertEquals(2500, $this->object->object()->getPoolLength());
			$this->assertEquals(890, $this->object->object()->getTotalStrokes());
			$this->assertEquals(25, $this->object->object()->getCadence());

			$this->assertEquals(2116, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(2354, $this->object->object()->getElapsedTime());
			$this->assertEquals(1.95, $this->object->object()->getDistance());

			$this->assertTrue($this->object->object()->hasArrayStroke());
			$this->assertTrue($this->object->object()->hasArrayStrokeType());

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertFalse($this->object->object()->hasArrayDistance());

			$timeArray = $this->object->object()->getArrayTime();
			$this->assertNotEquals(0, $timeArray[0]);
		}
	}

	/**
	 * Test: simple swimming file (Fenix 3)
	 * Filename: "swim-fenix-50m.fit" 
	 */
	public function testSwimmingFileFromFenix() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/swim-fenix-50m.fit');

			$this->assertFalse($this->object->hasMultipleTrainings() );
			$this->assertFalse($this->object->failed() );

			$this->assertEquals('fenix3', $this->object->object()->getCreator());
			$this->assertEquals(5000, $this->object->object()->getPoolLength());
			$this->assertEquals(1750, $this->object->object()->getTotalStrokes());
			$this->assertEquals(32, $this->object->object()->getCadence());

			$this->assertEquals(3272, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(3817, $this->object->object()->getElapsedTime());
			$this->assertEquals(2.05, $this->object->object()->getDistance());

			$this->assertTrue($this->object->object()->hasArrayStroke());
			$this->assertTrue($this->object->object()->hasArrayStrokeType());

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertFalse($this->object->object()->hasArrayDistance());

			$this->assertEquals(
				array(68, 68+80, 68+80+69, 68+80+69+86, 68+80+69+86+82, 68+80+69+86+82+91, 68+80+69+86+82+91+90, 68+80+69+86+82+91+90+98),
				array_slice($this->object->object()->getArrayTime(), 0, 8)
			);

			$timeArray = $this->object->object()->getArrayTime();
			$this->assertNotEquals(0, $timeArray[0]);
		}
	}

	/**
	 * Test: outdoor swimming file
	 * Filename: "swim-outdoor.fit" 
	 */
	public function testOutdoorSwimmingFile() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/swim-outdoor.fit');

			$this->assertFalse($this->object->hasMultipleTrainings() );
			$this->assertFalse($this->object->failed() );

			$this->assertEquals('fr910xt', $this->object->object()->getCreator());
			$this->assertEquals(0, $this->object->object()->getPoolLength());
			$this->assertEquals(424, $this->object->object()->getTotalStrokes());
			$this->assertEquals(27, $this->object->object()->getCadence());

			$this->assertEquals(1007, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(1007, $this->object->object()->getElapsedTime());
			$this->assertEquals(0.985, $this->object->object()->getDistance());

			$this->assertTrue($this->object->object()->hasArrayCadence());

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertTrue($this->object->object()->hasArrayDistance());
			$this->assertTrue($this->object->object()->hasArrayLatitude());
			$this->assertTrue($this->object->object()->hasArrayLongitude());
		}
	}

	/*
	 * Test: hrv
	 * Filename: "HRV-example.fit" 
	 */
	public function testHRV() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/HRV-example.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertTrue( $this->object->object()->hasArrayHRV() );

		}
	}

	/*
	 * Test: with power data
	 * Filename: "with-power.fit" 
	 */
	public function testWithPowerData() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/with-power.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals('edge810', $this->object->object()->getCreator());
			$this->assertEquals(3600 + 18*60 + 9, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(39.023, $this->object->object()->getDistance());

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertTrue($this->object->object()->hasArrayDistance());
			$this->assertTrue($this->object->object()->hasArrayAltitude());
			$this->assertTrue($this->object->object()->hasArrayHeartrate());
			$this->assertTrue($this->object->object()->hasArrayCadence());
			$this->assertTrue($this->object->object()->hasArrayTemperature());
			$this->assertTrue($this->object->object()->hasArrayPower());

		}
	}

	/*
	 * Test: multisport session from fenix 3
	 * Filename: "multisport-triathlon-fenix3.fit" 
	 */
	public function testMultisportTriathlonFromFenix3() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/multisport-triathlon-fenix3.fit');

			$this->assertFalse($this->object->failed());
			$this->assertTrue($this->object->hasMultipleTrainings());
			$this->assertEquals(5, $this->object->numberOfTrainings());

			$Swimming = $this->object->object(0);
			$this->assertEquals('09.08.2015 09:13:03', date('d.m.Y H:i:s', $Swimming->getTimestamp()));
			$this->assertEquals(1.526, $Swimming->getDistance());
			$this->assertEquals(2033, $Swimming->getTimeInSeconds());
			$this->assertTrue($Swimming->hasArrayDistance());
			$this->assertTrue($Swimming->hasArrayCadence());
			$this->assertFalse($Swimming->hasArrayHeartrate());
			$this->assertTrue($Swimming->hasArrayAltitude());
			$this->assertFalse($Swimming->hasArrayVerticalOscillation());
			$this->assertFalse($Swimming->hasArrayGroundContact());

			$Transition1 = $this->object->object(1);
			$this->assertEquals('09.08.2015 09:48:47', date('d.m.Y H:i:s', $Transition1->getTimestamp()));
			$this->assertEquals(0.367, $Transition1->getDistance());
			$this->assertEquals(165, $Transition1->getTimeInSeconds());

			$Cycling = $this->object->object(2);
			$this->assertEquals('09.08.2015 09:51:35', date('d.m.Y H:i:s', $Cycling->getTimestamp()));
			$this->assertEquals(40.261, $Cycling->getDistance());
			$this->assertEquals(4455, $Cycling->getTimeInSeconds());
			$this->assertTrue($Cycling->hasArrayDistance());
			$this->assertFalse($Cycling->hasArrayCadence());
			$this->assertTrue($Cycling->hasArrayHeartrate());
			$this->assertTrue($Cycling->hasArrayAltitude());
			$this->assertFalse($Cycling->hasArrayVerticalOscillation());
			$this->assertFalse($Cycling->hasArrayGroundContact());

			$Transition2 = $this->object->object(3);
			$this->assertEquals('09.08.2015 11:05:48', date('d.m.Y H:i:s', $Transition2->getTimestamp()));
			$this->assertEquals(0.419, $Transition2->getDistance());
			$this->assertEquals(109, $Transition2->getTimeInSeconds());

			$Running = $this->object->object(4);
			$this->assertEquals('09.08.2015 11:07:41', date('d.m.Y H:i:s', $Running->getTimestamp()));
			$this->assertEquals(9.317, $Running->getDistance());
			$this->assertEquals(2381, $Running->getTimeInSeconds());
			$this->assertTrue($Running->hasArrayDistance());
			$this->assertTrue($Running->hasArrayCadence());
			$this->assertTrue($Running->hasArrayHeartrate());
			$this->assertTrue($Running->hasArrayAltitude());
			$this->assertTrue($Running->hasArrayVerticalOscillation());
			$this->assertTrue($Running->hasArrayGroundContact());
		}
	}

	/*
	 * Test: 'stop' instead of 'stop_all' in file from osynce
	 * Filename: "osynce-stop-bug.fit" 
	 */
	public function testOsynceTimeProblem() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/osynce-stop-bug.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );
			$this->assertEquals('osynce', $this->object->object()->getCreator());

			$this->assertEquals(47*60 + 6, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(47*60 + 6, $this->object->object()->getArrayTimeLastPoint());
			$this->assertEquals(15.5, $this->object->object()->getDistance(), '', 0.1);

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertTrue($this->object->object()->hasArrayDistance());
			$this->assertTrue($this->object->object()->hasArrayAltitude());
			$this->assertTrue($this->object->object()->hasArrayHeartrate());
			$this->assertTrue($this->object->object()->hasArrayCadence());
			$this->assertTrue($this->object->object()->hasArrayTemperature());
			$this->assertTrue($this->object->object()->hasArrayPower());

			$timeArray = $this->object->object()->getArrayTime();
			$num = count($timeArray);

			for ($i = 2; $i < $num; ++$i) {
				if ($timeArray[$i] < $timeArray[$i-1]) {
					$this->assertTrue(false, sprintf(
						'Time array is not continuously increasing: %u < %u at index %u',
						$timeArray[$i], $timeArray[$i-1], $i
					));
					break;
				}
			}
		}
	}

	/**
	 * Test: groundcontact_balance
	 * Filename: "with-new-dynamics.fit"
	 * @group gcb
	 */
	public function testNewRunningDynamicsFromFenix3() {
		if (Shell::isPerlAvailable()) {
			$this->object->parseFile('../tests/testfiles/fit/with-new-dynamics.fit');

			$this->assertFalse( $this->object->hasMultipleTrainings() );
			$this->assertFalse( $this->object->failed() );

			$this->assertEquals(2*3600 + 17*60 + 50, $this->object->object()->getTimeInSeconds());
			$this->assertEquals(23.5, $this->object->object()->getDistance(), '', 0.1);

			$this->assertTrue($this->object->object()->hasArrayTime());
			$this->assertTrue($this->object->object()->hasArrayDistance());
			$this->assertTrue($this->object->object()->hasArrayCadence());
			$this->assertTrue($this->object->object()->hasArrayGroundContact());
			$this->assertTrue($this->object->object()->hasArrayGroundContactBalance());

			$this->assertEquals(5198, $this->object->object()->getGroundContactBalance(), '', 10);
		}
	}
}
