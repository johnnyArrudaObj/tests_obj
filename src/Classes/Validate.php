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
}
