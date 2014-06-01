<?php

namespace Fuel\Common;

use Codeception\TestCase\Test;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-25 at 17:46:44.
 */
class NumTest extends Test
{

	/**
	 * @var Num
	 */
	public $instance;

	/**
	 * @covers Fuel\Common\Num::__construct
	 * @group Common
	 */
	public function _before()
	{
		$this->instance = new Num();
	}

	/**
	 * @covers Fuel\Common\Num::bytes
	 * @group Common
	 */
	public function testBytes()
	{
		$output = $this->instance->bytes('200K');
		$expected = '204800';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::bytes
	 * @group Common
	 * @expectedException \Exception
	 */
	public function testBytesException()
	{
		$output = $this->instance->bytes('invalid');
	}

	/**
	 * @covers Fuel\Common\Num::formatBytes
	 * @group Common
	 */
	public function testformatBytes()
	{
		$output = $this->instance->formatBytes('204800');
		$expected = '200 KB';

		$this->assertEquals($expected, $output);

		$output = $this->instance->formatBytes('invalid');
		$this->assertFalse($output);
	}

	/**
	 * @covers Fuel\Common\Num::quantity
	 * @group Common
	 */
	public function testQuantity()
	{
		// Return the same
		$output = $this->instance->quantity('100');
		$expected = '100';

		$this->assertEquals($expected, $output);

		$output = $this->instance->quantity('7500');
		$expected = '8K';

		$this->assertEquals($expected, $output);

		$output = $this->instance->quantity('1500000');
		$expected = '2M';

		$this->assertEquals($expected, $output);


		$output = $this->instance->quantity('1000000000');
		$expected = '1B';

		$this->assertEquals($expected, $output);

		// Get current localized decimal separator
		$locale_conv = localeconv();
		$decimal_point = isset($locale_conv['decimal_point']) ? $locale_conv['decimal_point'] : '.';

		$output = $this->instance->quantity('7500', 1);
		$expected = '7'.$decimal_point.'5K';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::format
	 * @group Common
	 */
	public function testFormat()
	{
		$output = $this->instance->format('1234567890', '(000) 000-0000');
		$expected = '(123) 456-7890';

		$this->assertEquals($expected, $output);

		$output = $this->instance->format(null, '(000) 000-0000');
		$this->assertNull($output);

		$output = $this->instance->format('1234567890', null);
		$expected = '1234567890';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::maskString
	 * @group Common
	 */
	public function testMaskString()
	{
		$output = $this->instance->maskString('1234567812345678', '**** - **** - **** - 0000', ' -');
		$expected = '**** - **** - **** - 5678';

		$this->assertEquals($expected, $output);

		// Return the same
		$output = $this->instance->maskString('1234567812345678');
		$expected = '1234567812345678';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::formatPhone
	 * @group Common
	 */
	public function testFormatPhone()
	{
		$output = $this->instance->formatPhone('1234567890');
		$expected = '(123) 456-7890';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::smartFormatPhone
	 * @group Common
	 */
	public function testSmartFormatPhone()
	{
		$output = $this->instance->smartFormatPhone('1234567');
		$expected = '123-4567';

		$this->assertEquals($expected, $output);

		// Return the same
		$output = $this->instance->smartFormatPhone('123456');
		$expected = '123456';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::formatExp
	 * @group Common
	 */
	public function testFormatExp()
	{
		$output = $this->instance->formatExp('1234');
		$expected = '12-34';

		$this->assertEquals($expected, $output);

		$output = $this->instance->formatExp('1234', '0-00-0');
		$expected = '1-23-4';

		$this->assertEquals($expected, $output);
	}

	/**
	 * @covers Fuel\Common\Num::maskCreditCard
	 * @group Common
	 */
	public function testMaskCreditCard()
	{
		$output = $this->instance->maskCreditCard('1234567812345678');
		$expected = '**** **** **** 5678';

		$this->assertEquals($expected, $output);
	}
}
