<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_NUMBERS;

function runProgressionGame()
{
    $gameDescription = 'What number is missing in the progression?';
    $gameData = [];
    for ($index = 0; $index < ROUND_NUMBERS; $index++) {
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
        # $gameData[$index] = $progressionString . ' ' . (string) $missingMember;
        $gameData[$index][0] = $progressionString;
        $gameData[$index][1] = (string) $missingMember;
    }
    runEngine($gameDescription, $gameData);
}
