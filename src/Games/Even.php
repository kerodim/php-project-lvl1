<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\runEngine;

function generateEvenGameData()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    $gameDataSize = 3;
    for ($index = 0; $index < $gameDataSize; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $gameData[$index] = (string) $gameQuestion . ' ' . $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
