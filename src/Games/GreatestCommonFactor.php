<?php

namespace Braingames\Games\GreatestCommonFactor;

use function BrainGames\Cli\runEngine;

function calculateGcd()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $firstNumber = rand(1, 100);
        $seconfNumber = rand(1, 100);
        $givenNumbers = (string) $firstNumber . ' ' . (string) $seconfNumber;
        if ($firstNumber >= $seconfNumber) {
            $greaterNumber = $firstNumber;
            $lowerNumber = $seconfNumber;
        } else {
            $greaterNumber = $seconfNumber;
            $lowerNumber = $firstNumber;
        }
        $remainder = $greaterNumber % $lowerNumber;
        while ($remainder !== 0) {
            $greaterNumber = $lowerNumber;
            $lowerNumber = $remainder;
            $remainder = $greaterNumber % $lowerNumber;
        }
        $gameData[$index] = $givenNumbers . $separator . (string) $lowerNumber;
    }
    runEngine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
