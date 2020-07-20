<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\gameGreeting;
use function BrainGames\Cli\isUserAnswerTrue;
use function BrainGames\Cli\gameEnding;

/*
function showTaskToPlayerCalc()
{
    return 'What is the result of the expression?';
}

function generationMathExpression()
{
    $firstNumber = (string) rand(1, 100);
    $seconfNumber = (string) rand(1, 100);
    $listOfOperation = ['+', '-', '*'];
    $operation = $listOfOperation[rand(0, count($listOfOperation) - 1)];
    $expression = $firstNumber . ' ' . $operation . ' ' . $seconfNumber;
    return $expression;
}

function calculation($expression)
{
    $listOfOperation = ['+', '-', '*'];
    $index = 0;
    for ($index; $index <= 2; $index++) {
        $operatorPosition = mb_strpos($expression, $listOfOperation[$index]);
        if ($operatorPosition !== false) {
            $operator = $listOfOperation[$index];
        }
    }
    $operatorPosition = mb_strpos($expression, $operator);
    $firstNumber = (int) trim(substr($expression, 0, $operatorPosition));
    $seconfNumber = (int) trim(substr($expression, ($operatorPosition + 1) - strlen($expression)));
    switch ($operator) {
        case '+':
            $correctAnswer = $firstNumber + $seconfNumber;
            break;
        case '-':
            $correctAnswer = $firstNumber - $seconfNumber;
            break;
        case '*':
            $correctAnswer = $firstNumber * $seconfNumber;
            break;
        default:
            throw new \Error("Unknown operator: '{$operator}'!");
    }
    return (string) $correctAnswer;
}
*/

function calc()
{
    $gameDescription = 'What is the result of the expression?';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
        $firstNumber = rand(1, 100);
        $seconfNumber = rand(1, 100);
        $listOfOperation = ['+', '-', '*'];
        $numberOfOperations = count($listOfOperation) - 1;
        $operation = $listOfOperation[rand(0, $numberOfOperations)];
        $expression = (string) $firstNumber . ' ' . $operation . ' ' . (string) $seconfNumber;
        switch ($operation) {
            case '+':
                $correctAnswer = (string) ($firstNumber + $seconfNumber);
                break;
            case '-':
                $correctAnswer = (string) ($firstNumber - $seconfNumber);
                break;
            case '*':
                $correctAnswer = (string) ($firstNumber * $seconfNumber);
                break;
            default:
                throw new \Error("Unknown operator: '{$operation}'!");
        }
        if (isUserAnswerTrue($playerName, $expression, $correctAnswer)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
