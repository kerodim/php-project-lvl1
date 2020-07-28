<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\engine;

function progression()
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
        $progression = '';
        for ($count = 1; $count <= $progressionLehgth; $count++) {
            if ($count === $unknownMemberNumber) {
                $progression = $progression . '..';
                $missingMember = (string) $progressionMember;
            } else {
                $progression = $progression . (string) $progressionMember;
            }
            if ($count < $progressionLehgth) {
                $progression = $progression . ' ';
            }
            $progressionMember = $progressionMember + $progressionStep;
        }
        $gameData[$index] = $progression . $separator . $missingMember;
    }
    engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
