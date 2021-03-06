<?php

declare(strict_types=1);

namespace Braingames\Games\Prime;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\NUMBER_OF_ROUNDS;

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($count = 2; $count <= sqrt($number); $count++) {
        if ($number % $count === 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < NUMBER_OF_ROUNDS; $index++) {
        $gameQuestion = rand(1, 100);
        try {
            $correctAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        } catch (\TypeError $e) {
            print_r("Error: " . $e->getMessage() . "\n");
            exit;
        }
        $gameData[$index] = [$gameQuestion, $correctAnswer];
    }
    runEngine($gameDescription, $gameData);
}
