<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_OF_NUMBERS;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

function runEvenGame()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    for ($index = 0; $index < ROUND_OF_NUMBERS; $index++) {
        $gameQuestion = rand(1, 100);
        $correctAnswer = $gameQuestion % 2 === 0 ? 'yes' : 'no';
        $gameData[$index][INDEX_OF_QUESTIONS] = (string) $gameQuestion;
        $gameData[$index][INDEX_OF_ANSWERS] = (string) $correctAnswer;
    }
    runEngine($gameDescription, $gameData);
}
