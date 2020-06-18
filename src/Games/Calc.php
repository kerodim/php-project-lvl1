<?php

namespace BrainGames\Games\Calc;

function generationMathExpression()
{
    $firstNumber = (string) rand(1, 100);
    $seconfNumber = (string) rand(1, 100);
    $listOfOperation = ['+', '-', '*'];
    $operation = $listOfOperation[rand(0, 2)];
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
    $seconfNumber = (int) trim(substr($expression, $operatorPosition + 1, strlen($expression) - $operatorPosition));
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
    return $correctAnswer;
}
