<?php

namespace MyApp\Classes;

use InvalidArgumentException;

/**
 *
 */
class NumberAndWords
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
     * @param string $words
     * @return array<array<string, bool>>
     */
    public function verifyIfWordIsPrimeIsHappyIsMultipleFiveOrThree(string $words): array
    {
        if (empty($this->validateClass->clearWords($words))) {
            throw new InvalidArgumentException("Your word must contain at least one letter");
        }

        $arrayWordsAndNumericValues = $this->validateClass->getArrayWordsSum(
            explode(" ", $this->validateClass->clearWords($words))
        );
        $arrayFinal = [];
        foreach ($arrayWordsAndNumericValues as $oneWord => $numericValue) {
            $arrayFinal[$oneWord] = [
                'prime' => $this->validateClass->numberIsPrime($numericValue),
                'multiple' => $this->validateClass->verifyIsMultipleThreeOrFive($numericValue),
                'happy' => $this->validateClass->checkIfNumberIsHappy($numericValue)
            ];
        }

        return $arrayFinal;
    }
}
