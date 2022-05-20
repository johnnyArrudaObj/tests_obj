<?php

namespace MyApp\Classes;

/**
 * Class with rules to exercises
 */
class Validate
{
    /**
     * @param int $numberVerified
     * @param int $multiple
     * @return bool
     */
    public function numberIsMultipleOfOther(int $numberVerified, int $multiple): bool
    {
        return $numberVerified % $multiple == 0;
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyIsMultipleThreeOrFive(int $number): bool
    {
        return ($this->numberIsMultipleOfOther($number, 3) ||
            $this->numberIsMultipleOfOther($number, 5));
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyIsMultipleThreeAndFive(int $number): bool
    {
        return ($this->numberIsMultipleOfOther($number, 3) &&
            $this->numberIsMultipleOfOther($number, 5));
    }

    /**
     * @param int $number
     * @return bool
     */
    public function verifyIsMultipleFiveOrThreeAndSeven(int $number): bool
    {
        return (($this->verifyIsMultipleThreeOrFive($number)) &&
            $this->numberIsMultipleOfOther($number, 7));
    }

    /**
     * @param int $possibleNumber
     * @return bool
     */
    public function isPositiveInteger(int $possibleNumber): bool
    {
        if ($possibleNumber > 0) {
            return true;
        }
        return false;
    }

    /**
     * @param int $number
     * @return bool
     */
    public function checkIfNumberIsHappy(int $number): bool
    {
        $happy = [];
        while (true) {
            $array = str_split((string)$number);
            array_walk($array, function (&$a) {
                $a = pow((int)$a, 2);
            });
            $number = array_sum($array);
            if ($number == 1) {
                return true;
            }
            if (in_array($number, $happy)) {
                return false;
            }
            $happy[] = $number;
        }
    }
}
