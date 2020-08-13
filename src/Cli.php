<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;

function runEngine($gameDescription, $gameData)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line('');
    $maxCorrectAnswerNumber = 3;
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $roundData = $gameData[$index];
        $separatorPosition = strripos($roundData, ' ');
        $correctAnswer = substr($roundData, $separatorPosition + 1);
        $question = substr($roundData, 0, strlen($roundData) - strlen($correctAnswer) - 1);
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
