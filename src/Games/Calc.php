<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_OF_NUMBERS;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

function runCalcGame()
{
    $gameDescription = 'What is the result of the expression?';
    $gameData = [];
    for ($index = 0; $index < ROUND_OF_NUMBERS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];
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
        $gameData[$index][INDEX_OF_QUESTIONS] = $expression;
        $gameData[$index][INDEX_OF_ANSWERS] = (string) $expressionValue;
    }
    runEngine($gameDescription, $gameData);
}
