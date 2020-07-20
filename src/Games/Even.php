<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\gameGreeting;
use function BrainGames\Cli\isUserAnswerTrue;
use function BrainGames\Cli\gameEnding;

/*
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
*/

function even()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
        $number = rand(1, 100);
        if ($number % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        if (isUserAnswerTrue($playerName, $number, $correctAnswer)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
