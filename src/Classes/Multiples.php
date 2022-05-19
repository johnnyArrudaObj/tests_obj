<?php

namespace MyApp\Classes;

/**
 * Class with test book, multiples exercises
 */
class Multiples
{
    /**
     * @var Validate
     */
    private Validate $validateClass;
    /**
     * @var array<int>
     */
    private array $arrayWithRangeOfNumbers;

    /**
     * @param Validate $validate
     * @param int $startSearch
     * @param int $endSearch
     */
    public function __construct(Validate $validate, int $startSearch, int $endSearch)
    {
        $this->validateClass = $validate;
        $this->arrayWithRangeOfNumbers = range($startSearch, $endSearch - 1);
    }

    /**
     * @return int
     */
    public function sumMultipleThreeOrFive(): int
    {
        $array = array_filter($this->arrayWithRangeOfNumbers, function ($numberIndex) {
            return $this->validateClass->verifyIsMultipleThreeOrFive($numberIndex);
        });
        return array_sum($array);
    }

    /**
     * @return int
     */
    public function sumMultipleThreeAndFive(): int
    {
        $array = array_filter($this->arrayWithRangeOfNumbers, function ($numberIndex) {
            return $this->validateClass->verifyIsMultipleThreeAndFive($numberIndex);
        });
        return array_sum($array);
    }

    /**
     * @return int
     */
    public function sumMultipleFiveOrThreeAndSeven(): int
    {
        $array = array_filter($this->arrayWithRangeOfNumbers, function ($numberIndex) {
            return $this->validateClass->verifyIsMultipleFiveOrThreeAndSeven($numberIndex);
        });
        return array_sum($array);
    }
}
