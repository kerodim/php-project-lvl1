<?php

namespace Braingames\Games\Prime;

function showTaskToPlayerPrime()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generationRandomNumber()
{
    return rand(2, 3);
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
