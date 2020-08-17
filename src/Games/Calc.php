<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\runEngine;
use function BrainGames\Cli\getMaxCorrectAnswerNumber;

use const BrainGames\Cli\ROUNDNUMBERS;

function generateCalGameData()
{
    $gameDescription = 'What is the result of the expression?';
    $gameData = [];
    for ($index = 0; $index < ROUNDNUMBERS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $operations = ['+', '-', '*'];
        $numberOfOperations = count($operations);
        $operation = $operations[rand(0, $numberOfOperations - 1)];
        $expression = (string) $firstNumber . ' ' . $operation . ' ' . (string) $secondNumber;
        switch ($operation) {
            case '+':
                $expressionValue = $firstNumber + $secondNumber;
                break;
            case '-':
                $expressionValue = $firstNumber - $secondNumber;
                break;
            case '*':
                $expressionValue = $firstNumber * $secondNumber;
                break;
            default:
                throw new \Error("Unknown operator: '{$operation}'!");
        }
        $gameData[$index] = $expression . ' ' . (string) $expressionValue;
    }
    runEngine($gameDescription, $gameData);
}
