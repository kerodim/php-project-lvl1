<?php

namespace Braingames\Games\GreatestCommonFactor;

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
    while ($remainder > 0) {
        $greaterNumber = $lowerNumber;
        $lowerNumber = $remainder;
        $remainder = $greaterNumber % $lowerNumber;
    }
    return $lowerNumber;
}
