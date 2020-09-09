<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

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
        $gameData[$index][INDEX_OF_QUESTIONS] = $gameQuestion;
        $gameData[$index][INDEX_OF_ANSWERS] = $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
