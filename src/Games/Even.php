<?php

namespace BrainGames\Games\Even;

function isEven($number)
{
    if ($number % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
    return $correctAnswer;
}
