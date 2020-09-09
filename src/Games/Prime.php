<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;

function isPrime($number)
{
    if (($number < 2) || (!is_int($number))) {
        return false;
    }
    for ($count = 2; $count <= sqrt($number); $count++) {
        if ($number % $count === 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < ROUND_NUMBERS; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        $gameData[$index][0] = $gameQuestion;
        $gameData[$index][1] = $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
