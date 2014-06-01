<?php

namespace Fuel\Common\Table;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-25 at 15:51:45.
 */
class RowTest extends \Codeception\TestCase\Test
{

	/**
	 * @var Cell
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function _before()
	{
		$this->object = new Row;
	}

	/**
	 * @covers Fuel\Common\Table\Row::set
	 * @group Common
	 */
	public function testAddCell()
	{
		$this->object[] = new Cell();

		$this->assertEquals(1, count($this->object));
	}

	/**
	 * @covers Fuel\Common\Table\Row::set
	 * @expectedException \InvalidArgumentException
	 * @group Common
	 */
	public function testAddCellInvalid()
	{
		$this->object[] = 'failure';
	}

	/**
	 * @covers Fuel\Common\Table\Row::set
	 * @group Common
	 */
	public function testAddCells()
	{
		$this->object[] = new Cell();
		$this->object[] = new Cell();
		$this->object[] = new Cell();

		$this->assertEquals(3, count($this->object));
	}

	/**
	 * @covers Fuel\Common\Table\Row::setAttributes
	 * @covers Fuel\Common\Table\Row::getAttributes
	 * @group Common
	 */
	public function testSetGetAttributes()
	{
		$attributes = array('class' => 'table', 'id' => 'test');

		$this->object->setAttributes($attributes);

		$this->assertEquals($attributes, $this->object->getAttributes());
	}

	/**
	 * @covers Fuel\Common\Table\Row::getType
	 * @group Common
	 */
	public function testGetType()
	{
		$this->assertEquals(EnumRowType::Body, $this->object->getType());
	}

	/**
	 * @covers Fuel\Common\Table\Row::setType
	 * @covers Fuel\Common\Table\Row::getType
	 * @group Common
	 */
	public function testSetType()
	{
		$this->object->setType(EnumRowType::Footer);
		$this->assertEquals(EnumRowType::Footer, $this->object->getType());
	}

}
