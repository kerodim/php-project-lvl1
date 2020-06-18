<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;
use function BrainGames\Games\Even\generationRandomNumber;
use function BrainGames\Games\Even\isEven;
use function BrainGames\Games\Calc\generationMathExpression;
use function BrainGames\Games\Calc\calculation;

function run($game)
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $raunds = 3;
    for ($raunds; $raunds >= 1;) {
        switch ($game) {
            case 'brain-even':
                $question = generationRandomNumber();
                $correctAnswer = isEven($question);
                break;
            case 'brain-calc':
                $question = generationMathExpression();
                $correctAnswer = calculation($question);
                break;
            default:
                throw new \Error("Unknown game: '{$game}'!");
        }
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $raunds = $raunds - 1;
        } else {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, " . $name . '!');
        }
    }
}
