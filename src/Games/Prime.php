<?php

namespace Braingames\Games\Prime;

use function BrainGames\Cli\gameGreeting;
use function BrainGames\Cli\isUserAnswerTrue;
use function BrainGames\Cli\gameEnding;

/*
function showTaskToPlayerPrime()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generationRandomNumber()
{
    return rand(1, 100);
}

function isPrime($number)
{
    $primes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    foreach ($primes as $prime) {
        if ($prime === $number) {
            $correctAnswer = 'yes';
            break;
        } else {
            $correctAnswer = 'no';
        }
    }
    return $correctAnswer;
}
*/

function prime()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
        $number = rand(1, 100);
        $correctAnswer = "yes";
        if ($number === 1) {
            $correctAnswer = "no";
        }
        for ($index = 2; $index <= sqrt($number); $index++) {
            if ($number % $index === 0) {
                $correctAnswer = "no";
                break;
            }
        }
        if (isUserAnswerTrue($playerName, $number, $correctAnswer)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
