<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;

function runCalGame()
{
    $gameDescription = 'What is the result of the expression?';
    $gameData = [];
    for ($index = 0; $index < ROUND_NUMBERS; $index++) {
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
        $gameData[$index] = $expression . ' ' . (string) $expressionValue;
    }
    runEngine($gameDescription, $gameData);
}
