<?php

namespace MyApp\Classes;

use InvalidArgumentException;

/**
 * Class with test book, happy number exercises
 */
class HappyNumbers
{
    /**
     * @var Validate
     */
    private Validate $validateClass;

    /**
     * @param Validate $validate
     */
    public function __construct(Validate $validate)
    {
        $this->validateClass = $validate;
    }

    /**
     * @param int $numberInteger
     * @return string
     */
    public function isHappyNumber(int $numberInteger): string
    {
        if (!$this->validateClass->isPositiveInteger($numberInteger)) {
            throw new InvalidArgumentException("Not a positive integer");
        }

        if ($this->validateClass->checkIfNumberIsHappy($numberInteger)) {
            return "Is a Happy Number";
        }
        return "Is not a Happy Number";
    }
}
