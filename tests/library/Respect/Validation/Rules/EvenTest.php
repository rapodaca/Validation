<?php

namespace Respect\Validation\Rules;

class EvenTest extends \PHPUnit_Framework_TestCase
{

    protected $object;

    protected function setUp()
    {
        $this->object = new Even;
    }

    /**
     * @dataProvider providerForEven
     *
     */
    public function testEven($input)
    {
        $this->assertTrue($this->object->assert($input));
    }

    /**
     * @dataProvider providerForNotEven
     * @expectedException Respect\Validation\Exceptions\EvenException
     */
    public function testNotEven($input)
    {
        $this->assertTrue($this->object->assert($input));
    }
    
    /**
     * @dataProvider providerForNotInt
     * @expectedException Respect\Validation\Exceptions\IntException
     */
    public function testNotInt($input)
    {
        $this->assertTrue($this->object->assert($input));
    }

    public function providerForEven()
    {
        return array(
            array(-2),
            array(-0),
            array(0),
            array(32),            
        );
    }

    public function providerForNotEven()
    {
        return array(
            array(-5),
            array(-1),
            array(1),
            array(13),
        );
    }
    
    public function providerForNotInt()
    {
        return array(
            array(null),
            array('a'),
            array(' '),
            array('Foo'),
            array(''),
            array('1.44'),
            array(1e-5),
        );
    }

}