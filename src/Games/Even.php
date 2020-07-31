<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\engine;

function checkEven()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $number = rand(1, 100);
        $number % 2 === 0 ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $gameData[$index] = (string) $number . $separator . $correctAnswer;
    }
    engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
