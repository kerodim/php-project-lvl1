<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\runEngine;

use const BrainGames\Cli\ROUND_OF_NUMBERS;
use const BrainGames\Cli\INDEX_OF_QUESTIONS;
use const BrainGames\Cli\INDEX_OF_ANSWERS;

function runProgressionGame()
{
    $gameDescription = 'What number is missing in the progression?';
    $gameData = [];
    for ($index = 0; $index < ROUND_OF_NUMBERS; $index++) {
        $firstProgressionMember = rand(1, 100);
        $progressionStep = rand(-5, 5);
        $progressionLehgth = 10;
        $unknownMemberNumber = rand(1, $progressionLehgth);
        $missingMember = $firstProgressionMember + $progressionStep * $unknownMemberNumber;
        $progression = [];
        for ($count = 0; $count < $progressionLehgth; $count++) {
            $progression[] = $firstProgressionMember + $progressionStep * $count;
        }
        $progression[$unknownMemberNumber] = '..';
        $progressionString = implode(' ', $progression);
        $gameData[$index][INDEX_OF_QUESTIONS] = $progressionString;
        $gameData[$index][INDEX_OF_ANSWERS] = (string) $missingMember;  
    }
    runEngine($gameDescription, $gameData);
}
