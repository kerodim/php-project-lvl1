<?php

namespace BrainGames\Games\Even;

function question()
{
    return rand(1, 100);
}


function isEven($number)
{
    if ($number % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
    return $correctAnswer;
}
