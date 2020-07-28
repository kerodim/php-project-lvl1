<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;

function engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line('');
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $roundData = $gameData[$index];
        $separatorPosition = strripos($roundData, $separator);
        $correctAnswer = substr($roundData, $separatorPosition + strlen($separator));
        $question = substr($roundData, 0, strlen($roundData) - strlen($correctAnswer) - strlen($separator));
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            break;
        }
        if ($index === $maxCorrectAnswerNumber - 1) {
            line("Congratulations, %s!", $playerName);
        }
    }
}
