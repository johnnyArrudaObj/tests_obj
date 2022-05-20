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

    /**
     * @param int $number
     * @return bool
     */
    public function numberIsPrime(int $number): bool
    {
        if (gmp_prob_prime($number) === 2) {
            return true;
        }
        return false;
    }

    /**
     * @return array<int>
     */
    public function getAlphabeticalArray(): array
    {
        return array_replace(
            $this->getAlphabeticalArrayLowerCase(),
            $this->getAlphabeticalArrayUpperCase()
        );
    }

    /**
     * @return array<int>
     */
    public function getAlphabeticalArrayLowerCase(): array
    {
        return array_combine(range('a', 'z'), range(1, 26));
    }

    /**
     * @return array<int>
     */
    public function getAlphabeticalArrayUpperCase(): array
    {
        return array_combine(range('A', 'Z'), range(27, 52));
    }

    /**
     * @param array<int, string> $words
     * @return array<int>
     */
    public function getArrayWordsSum(array $words): array
    {
        return array_merge(
            ...array_map(function ($word) {
                return [$word => $this->transformWordsInNumberRepresentation($word)];
            }, $words)
        );
    }

    /**
     * @param string $words
     * @return string
     */
    public function clearWords(string $words): string
    {
        return trim((string)preg_replace(["/[^a-z A-Z]/", "/\s+/"], " ", $words));
    }

    /**
     * @param string $word
     * @return int
     */
    public function transformWordsInNumberRepresentation(string $word): int
    {
        $alphabeticalArray = $this->getAlphabeticalArray();
        return array_sum(
            array_map(function ($letter) use ($alphabeticalArray) {
                if ($alphabeticalArray[$letter]) {
                    return $alphabeticalArray[$letter];
                }
            }, str_split($word))
        );
    }
}
