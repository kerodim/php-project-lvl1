<?php

namespace Braingames\Games\GreatestCommonDivisor;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;

function findGreatestCommonDivisor($firstNumber, $secondNumber)
{
    if ($firstNumber >= $secondNumber) {
        $greaterNumber = $firstNumber;
        $lowerNumber = $secondNumber;
    } else {
        $greaterNumber = $secondNumber;
        $lowerNumber = $firstNumber;
    }
    $remainder = $greaterNumber % $lowerNumber;
    while ($remainder !== 0) {
        $greaterNumber = $lowerNumber;
        $lowerNumber = $remainder;
        $remainder = $greaterNumber % $lowerNumber;
    }
    return $lowerNumber;
}

function runGcdGame()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    for ($index = 0; $index < ROUND_NUMBERS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $givenNumbers = (string) $firstNumber . ' ' . (string) $secondNumber;
        $greatestCommonDivisor = findGreatestCommonDivisor($firstNumber, $secondNumber);
        # $gameData[$index] = $givenNumbers . ' ' . (string) $greatestCommonDivisor;
        $gameData[$index][0] = $givenNumbers;
        $gameData[$index][1] = (string) $greatestCommonDivisor;
    }
    runEngine($gameDescription, $gameData);
}
