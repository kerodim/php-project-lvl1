<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\NUMBER_OF_ROUNDS;

function runCalcGame()
{
    $gameDescription = 'What is the result of the expression?';
    $gameData = [];
    for ($index = 0; $index < NUMBER_OF_ROUNDS; $index++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];
        $expression = $firstNumber . ' ' . $operation . ' ' . $secondNumber;
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
        $gameData[$index] = [$expression, (string) $expressionValue];
    }
    runEngine($gameDescription, $gameData);
}
