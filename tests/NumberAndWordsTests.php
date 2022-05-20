<?php

use MyApp\Classes\NumberAndWords;
use MyApp\Classes\Validate;
use PHPUnit\Framework\TestCase;

/**
 * Class of Tests
 */
class NumberAndWordsTest extends TestCase
{
    /**
     * @var NumberAndWords
     */
    private NumberAndWords $numberAndWordsClass;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->numberAndWordsClass = new NumberAndWords(new Validate());
    }

    /**
     * @return void
     */
    public function testIsWordValid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Your word must contain at least one letter");
        $this->numberAndWordsClass->verifyIfWordIsPrimeIsHappyIsMultipleFiveOrThree("-1");
    }

    /**
     * @dataProvider setCompostWords
     */
    public function testIsHappyNumberMessageReturnTrue(string $data): void
    {
        $this->assertEquals(
            json_encode($this->getCompostWords()[$data]),
            json_encode($this->numberAndWordsClass->verifyIfWordIsPrimeIsHappyIsMultipleFiveOrThree($data)),
        );
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function setCompostWords(): array
    {
        return [
            'Johnny Silva' => ['Johnny Silva'],
            '1Johnny2 2Silva35' => ['1Johnny2 2Silva35'],
            'Johnny silva' => ['Johnny silva'],
            '!Johnny2 #silva@@' => ['!Johnny2 #silva@@']
        ];
    }

    /**
     * @return array<string, array<string, array<string, bool>>>
     */
    public function getCompostWords(): array
    {
        return [
            'Johnny Silva' => [
                'Johnny' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'Silva' => ['prime' => true, 'multiple' => false, 'happy' => false]
            ],
            '1Johnny2 2Silva35' => [
                'Johnny' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'Silva' => ['prime' => true, 'multiple' => false, 'happy' => false]
            ],
            'Johnny silva' => [
                'Johnny' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'silva' => ['prime' => false, 'multiple' => true, 'happy' => false]
            ],
            '!Johnny2 #silva@@' => [
                'Johnny' => ['prime' => false, 'multiple' => false, 'happy' => false],
                'silva' => ['prime' => false, 'multiple' => true, 'happy' => false]
            ]
        ];
    }
}
