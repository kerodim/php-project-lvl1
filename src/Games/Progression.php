<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\runEngine;
use function BrainGames\Cli\getMaxCorrectAnswerNumber;

function generateProgressionGameData()
{
    $gameDescription = 'What number is missing in the progression?';
    $gameData = [];
    $gameDataSize = getMaxCorrectAnswerNumber();
    for ($index = 0; $index < $gameDataSize; $index++) {
        $progressionMember = rand(1, 100);
        $progressionStep = rand(-5, 5);
        $progressionLehgth = 10;
        $unknownMemberNumber = rand(1, $progressionLehgth);
        $missingMember = $progressionMember + $progressionStep * $unknownMemberNumber;
        $progression = [];
        for ($count = 1; $count <= $progressionLehgth; $count++) {
            $progression[] = $progressionMember + $progressionStep * $count;
        }
        $progression[$unknownMemberNumber - 1] = '..';
        $progressionString = implode(' ', $progression);
        $gameData[$index] = $progressionString . ' ' . $missingMember;
    }
    runEngine($gameDescription, $gameData);
}
