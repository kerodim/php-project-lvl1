<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\engine;

function calculateExpression()
{
    $gameDescription = 'What is the result of the expression?';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $firstNumber = rand(1, 100);
        $seconfNumber = rand(1, 100);
        $listOfOperation = ['+', '-', '*'];
        $numberOfOperations = count($listOfOperation) - 1;
        $operation = $listOfOperation[rand(0, $numberOfOperations)];
        $expression = (string) $firstNumber . ' ' . $operation . ' ' . (string) $seconfNumber;
        switch ($operation) {
            case '+':
                $expressionValue = (string) ($firstNumber + $seconfNumber);
                break;
            case '-':
                $expressionValue = (string) ($firstNumber - $seconfNumber);
                break;
            case '*':
                $expressionValue = (string) ($firstNumber * $seconfNumber);
                break;
            default:
                throw new \Error("Unknown operator: '{$operation}'!");
        }
        $gameData[$index] = $expression . $separator . $expressionValue;
    }
    engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
