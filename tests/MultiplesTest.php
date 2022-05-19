<?php

use MyApp\Classes\Multiples;
use MyApp\Classes\Validate;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MultiplesTest extends TestCase
{
    /** @var Multiples */
    private Multiples $multiples;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->multiples = new Multiples(new Validate(), 1, 1000);
    }

    /**
     * @return void
     */
    public function testMultipleFiveOrThree(): void
    {
        $this->assertEquals(233168, $this->multiples->sumMultipleThreeOrFive());
    }

    /**
     * @return void
     */
    public function testMultipleFiveAndThree(): void
    {
        $this->assertEquals(33165, $this->multiples->sumMultipleThreeAndFive());
    }

    /**
     * @return void
     */
    public function testMultipleFiveOrThreeAndSeven(): void
    {
        $this->assertEquals(33173, $this->multiples->sumMultipleFiveOrThreeAndSeven());
    }
}
