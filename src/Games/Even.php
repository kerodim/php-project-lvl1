<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\NUMBER_OF_ROUNDS;

function runEvenGame()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < NUMBER_OF_ROUNDS; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = $gameQuestion % 2 === 0 ? 'yes' : 'no';
        $gameData[$index] = [$gameQuestion, $correctAnswer];
    }
    runEngine($gameDescription, $gameData);
}
