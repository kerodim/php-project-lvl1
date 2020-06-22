<?php

namespace BrainGames\Games\Even;

function showTaskToPlayerEven()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generationRandomNumber()
{
    return rand(1, 100);
}

function isEven($number)
{
    if ($number % 2 === 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
    return $correctAnswer;
}
