<?php

namespace Braingames\Games\GreatestCommonDivisor;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\NUMBER_OF_ROUNDS;

function findGreatestCommonDivisor($firstNumber, $secondNumber)
{
    $greaterNumber = max($firstNumber, $secondNumber);
    $lowerNumber = min($firstNumber, $secondNumber);
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
    for ($index = 0; $index < NUMBER_OF_ROUNDS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $givenNumbers = $firstNumber . ' ' . $secondNumber;
        $greatestCommonDivisor = findGreatestCommonDivisor($firstNumber, $secondNumber);
        $gameData[$index] = [$givenNumbers, (string) $greatestCommonDivisor];
    }
    runEngine($gameDescription, $gameData);
}
