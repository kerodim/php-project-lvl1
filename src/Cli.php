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
use function Braingames\Games\Progression\showTaskToPlayerProgression;
use function Braingames\Games\Progression\generationArithmeticProgression;
use function BrainGames\Games\Prime\showTaskToPlayerPrime;
use function BrainGames\Games\Prime\generationRandomNumber as generationRandomNumberPrime;
use function BrainGames\Games\Prime\isPrime;

/*
function run($game)
{

    line('Welcome to the Brain Games!');
    switch ($game) {
        case 'brain-even':
            $taskToPlayer = showTaskToPlayerEven();
            break;
        case 'brain-calc':
            $taskToPlayer = showTaskToPlayerCalc();
            break;
        case 'brain-gcd':
            $taskToPlayer = showTaskToPlayerGCD();
            break;
        case 'brain-progression':
            $taskToPlayer = showTaskToPlayerProgression();
            break;
        case 'brain-prime':
            $taskToPlayer = showTaskToPlayerPrime();
            break;
        default:
            throw new \Error("Unknown game: '{$game}'!");
    }
    line($taskToPlayer);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $round = 1;
    for ($round; $round <= 3;) {
        switch ($game) {
            case 'brain-even':
                $question = generationRandomNumber();
                $correctAnswer = isEven($question);
                break;
            case 'brain-calc':
                $question = generationMathExpression();
                $correctAnswer = calculation($question);
                break;
            case 'brain-gcd':
                $question = generationTwoRandomNumbers();
                $correctAnswer = calculationGCD($question);
                break;
            case 'brain-progression':
                $result = generationArithmeticProgression();
                $question = $result[0];
                $correctAnswer = $result[1];
                break;
            case 'brain-prime':
                $question = generationRandomNumberPrime();
                $correctAnswer = isPrime($question);
                break;
            default:
                throw new \Error("Unknown game: '{$game}'!");
        }
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $round = $round + 1;
        } else {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, " . $name . '!');
        }
    }
}
*/

function gameGreeting($gameDescription)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line('');
    return $playerName;
}

function gameQuestions($playerName, $question, $correctAnswer)
{
    line('Question: ' . $question);
    $userAnswer = prompt('Your answer');
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
        line("Let's try again, " . $playerName . '!');
        return false;
    }
}

function gameEnding($playerName)
{
    line("Congratulations, %s!", $playerName);
}
