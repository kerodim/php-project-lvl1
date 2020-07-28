<?php

namespace Braingames\Games\Prime;

#use function BrainGames\Cli\gameGreeting;
#use function BrainGames\Cli\isUserAnswerTrue;
#use function BrainGames\Cli\gameEnding;
use function BrainGames\Cli\engine;

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

function prime_old()
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
