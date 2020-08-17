<?php

namespace Braingames\Games\GreatestCommonFactor;

use function BrainGames\Cli\runEngine;

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

function generateGcdGameData()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    $gameDataSize = 3;
    for ($index = 0; $index < $gameDataSize; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $givenNumbers = (string) $firstNumber . ' ' . (string) $secondNumber;
        $greatestCommonDivisor = findGreatestCommonDivisor($firstNumber, $secondNumber);
        $gameData[$index] = $givenNumbers . ' ' . (string) $greatestCommonDivisor;
    }
    runEngine($gameDescription, $gameData);
}
