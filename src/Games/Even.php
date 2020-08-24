<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;

function runEvenGame()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < ROUND_NUMBERS; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = $gameQuestion % 2 === 0 ? 'yes' : 'no';
        $gameData[$index] = (string) $gameQuestion . ' ' . $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
