<?php

namespace Braingames\Games\GreatestCommonDivisor;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_OF_NUMBERS;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

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
    for ($index = 0; $index < ROUND_OF_NUMBERS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $givenNumbers = $firstNumber . ' ' . $secondNumber;
        $greatestCommonDivisor = findGreatestCommonDivisor($firstNumber, $secondNumber);
        $gameData[$index][INDEX_OF_QUESTIONS] = $givenNumbers;
        $gameData[$index][INDEX_OF_ANSWERS] = (string) $greatestCommonDivisor;
    }
    runEngine($gameDescription, $gameData);
}
