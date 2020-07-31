<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

function isPrime($number)
{
    $result = true;
    if ($number === 1) {
        $result = false;
    }
    for ($count = 2; $count <= sqrt($number); $count++) {
        if ($number % $count === 0) {
            $result = false;
            break;
        }
    }
    return $result;
}

function definitionPrimeNumber()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $number = rand(1, 100);
        isPrime($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $gameData[$index] = $number . ' ' . $correctAnswer;
    }
    runEngine($gameDescription, $gameData, $maxCorrectAnswerNumber);
}
