<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\runEngine;

function findProgressionMember()
{
    $gameDescription = 'What number is missing in the progression?';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $progressionMember = rand(1, 100);
        $progressionStep = rand(-5, 5);
        $progressionLehgth = 10;
        $unknownMemberNumber = rand(1, $progressionLehgth);
        $progression = [];
        for ($count = 1; $count <= $progressionLehgth; $count++) {
            if ($count === $unknownMemberNumber) {
                $progression[] = '..';
                $missingMember = (string) $progressionMember;
            } else {
                $progression[] = (string) $progressionMember;
            }
            $progressionString = implode(' ', $progression);
            $progressionMember = $progressionMember + $progressionStep;
        }
        $gameData[$index] = $progressionString . $separator . $missingMember;
    }
    runEngine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
