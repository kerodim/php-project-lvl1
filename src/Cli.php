<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runEngine($gameDescription, $gameData)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line('');
    foreach ($gameData as [$question, $correctAnswer]) {
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            return;
        }
    }
    line("Congratulations, %s!", $playerName);
}
