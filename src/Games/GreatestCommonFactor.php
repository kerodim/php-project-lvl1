<?php

namespace Braingames\Games\GreatestCommonFactor;

use function BrainGames\Cli\runEngine;

function generateGcdGameData()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    $gameDataSize = 3;
    for ($index = 0; $index < $gameDataSize; $index++) {
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
        $gameData[$index] = $givenNumbers . ' ' . (string) $lowerNumber;
    }
    runEngine($gameDescription, $gameData);
}
