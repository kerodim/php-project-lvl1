<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;
use function BrainGames\Cli\getMaxCorrectAnswerNumber;

use const BrainGames\Cli\ROUNDNUMBERS;

function isPrime($number)
{
    if (($number < 2) || ($number % 1 !== 0)) {
        return false;
    }
    for ($count = 2; $count <= sqrt($number); $count++) {
        if ($number % $count === 0) {
            return false;
        }
    }
    return true;
}

function generatePrimeGameData()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < ROUNDNUMBERS; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        $gameData[$index] = $gameQuestion . ' ' . $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
