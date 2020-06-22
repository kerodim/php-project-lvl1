<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;
use function BrainGames\Games\Even\showTaskToPlayerEven;
use function BrainGames\Games\Even\generationRandomNumber;
use function BrainGames\Games\Even\isEven;
use function BrainGames\Games\Calc\showTaskToPlayerCalc;
use function BrainGames\Games\Calc\generationMathExpression;
use function BrainGames\Games\Calc\calculation;
use function BrainGames\Games\GreatestCommonFactor\showTaskToPlayerGCD;
use function BrainGames\Games\GreatestCommonFactor\generationTwoRandomNumbers;
use function BrainGames\Games\GreatestCommonFactor\calculationGCD;

function run($game)
{
    switch ($game) {
        case 'brain-even':
            $taskToPlayer = showTaskToPlayerEven();
            $question = generationRandomNumber();
            $correctAnswer = isEven($question);
            break;
        case 'brain-calc':
            $taskToPlayer = showTaskToPlayerCalc();
            $question = generationMathExpression();
            $correctAnswer = calculation($question);
            break;
        case 'brain-gcd':
            $taskToPlayer = showTaskToPlayerGCD();
            $question = generationTwoRandomNumbers();
            $correctAnswer = calculationGCD($question);
            break;
        default:
            throw new \Error("Unknown game: '{$game}'!");
    }
    line('Welcome to the Brain Games!');
    line($taskToPlayer);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $raunds = 3;
    for ($raunds; $raunds >= 1;) {
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
