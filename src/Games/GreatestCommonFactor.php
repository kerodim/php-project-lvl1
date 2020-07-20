<?php

namespace Braingames\Games\GreatestCommonFactor;

use function BrainGames\Cli\gameGreeting;
use function BrainGames\Cli\isUserAnswerTrue;
use function BrainGames\Cli\gameEnding;

/*
function showTaskToPlayerGCD()
{
    return 'Find the greatest common divisor of given numbers.';
}

function generationTwoRandomNumbers()
{
    return (string) rand(1, 100) . ' ' . (string) rand(1, 100);
}

function calculationGCD($numbers)
{
    $spacePosition = mb_strpos($numbers, ' ');
    $firstNumber = (int) trim(substr($numbers, 0, $spacePosition));
    $seconfNumber = (int) trim(substr($numbers, ($spacePosition + 1) - strlen($numbers)));
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
    return (string) $lowerNumber;
}
*/

function gcd()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
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
        $greatestCommonDivisor = (string) $lowerNumber;
        if (isUserAnswerTrue($playerName, $givenNumbers, $greatestCommonDivisor)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
