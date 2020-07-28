<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\engine;

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

function prime()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $number = rand(1, 100);
        isPrime($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $gameData[$index] = $number . $separator . $correctAnswer;
    }
    var_dump($gameData);
    engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
