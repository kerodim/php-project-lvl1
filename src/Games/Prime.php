<?php

declare(strict_types=1);

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\NUMBERS_OF_ROUND;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

function isPrime(int $number)
{
    # print_r("\nnumber - {$number}");
    if ($number < 2) {
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
    for ($index = 0; $index < NUMBERS_OF_ROUND; $index++) {
        $gameQuestion = rand(1, 100);
        /* $gameQuestion = 3.5;
        try {
            $correctAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        } catch (TypeError $e) {
             echo 'Ошибка: '.$e->getMessage();
        }
        */
        $correctAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        $gameData[$index][INDEX_OF_QUESTIONS] = $gameQuestion;
        $gameData[$index][INDEX_OF_ANSWERS] = $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
