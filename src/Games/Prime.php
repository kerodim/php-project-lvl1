<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

function isPrime($number)
{
    if ($number === 1) {
        return false;
    }
    for ($count = 2; $count <= sqrt($number); $count++) {
        if ($number % $count === 0) {
            return false;
        }
    }
    return true;
}

function definitionPrimeNumber()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    $gameDataSize = 3;
    for ($index = 0; $index < $gameDataSize; $index++) {
        $number = rand(1, 100);
        isPrime($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $gameData[$index] = $number . ' ' . $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
