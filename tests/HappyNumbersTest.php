<?php

use MyApp\Classes\HappyNumbers;
use MyApp\Classes\Validate;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class HappyNumbersTest extends TestCase
{
    /**
     * @var HappyNumbers
     */
    private HappyNumbers $happyClass;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->happyClass = new HappyNumbers(new Validate());
    }

    /**
     * @return void
     */
    public function testNumberNotIsIntegerPositive(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Not a positive integer");

        $this->happyClass->isHappyNumber(-1);
    }

    /**
     * @return void
     */
    public function testHappyNumber(): void
    {
        $this->assertEquals("Is a Happy Number", $this->happyClass->isHappyNumber(7));
    }

    /**
     * @return void
     */
    public function testNotHappyNumber(): void
    {
        $this->assertEquals("Is not a Happy Number", $this->happyClass->isHappyNumber(2));
    }
}
