<?php

namespace FuelPHP\Migration\Storage;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-11 at 10:45:50.
 */
class StorageTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var Storage
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = \Mockery::mock('FuelPHP\Migration\Storage\Storage[save, getPast]');
		$this->object->shouldReceive('save')->andReturn(true);
		$this->object->shouldReceive('getPast')->andReturn(true);
	}

	/**
	 * @covers FuelPHP\Migration\Storage\Storage::get
	 * @covers FuelPHP\Migration\Storage\Storage::add
	 * @group  Migration
	 */
	public function testAdd()
	{
		$string = 'foobar';
		
		$this->object->add($string);
		
		$this->assertEquals(
			array($string => $string),
			$this->object->get()
		);
	}

	/**
	 * @covers FuelPHP\Migration\Storage\Storage::add
	 * @covers FuelPHP\Migration\Storage\Storage::get
	 * @covers FuelPHP\Migration\Storage\Storage::remove
	 * @group  Migration
	 */
	public function testRemove()
	{
		$string1 = 'foo';
		$string2 = 'bar';
		
		$this->object->add($string1)
			->add($string2)
			->remove($string1);
		
		$this->assertEquals(
			array($string2 => $string2),
			$this->object->get()
		);
	}

	/**
	 * @covers FuelPHP\Migration\Storage\Storage::get
	 * @covers FuelPHP\Migration\Storage\Storage::add
	 * @covers FuelPHP\Migration\Storage\Storage::reset
	 * @group  Migration
	 */
	public function testReset()
	{
		$this->object->add('abc')
			->add('def')
			->reset();
		
		$this->assertEquals(array(), $this->object->get());
	}

}