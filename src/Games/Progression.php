<?php

namespace Braingames\Games\Progression;

use function BrainGames\Cli\gameGreeting;
use function BrainGames\Cli\isUserAnswerTrue;
use function BrainGames\Cli\gameEnding;

/*
function showTaskToPlayerProgression()
{
    return 'What number is missing in the progression?';
}

function generationArithmeticProgression()
{
    $progressionMember = rand(1, 100);
    $progressionStep = rand(-5, 5);
    $progressionLehgth = 10;
    $unknownMemberNumber = rand(1, $progressionLehgth);
    $index = 1;
    $progression = '';
    for ($index; $index <= $progressionLehgth; $index++) {
        if ($index === $unknownMemberNumber) {
            $progression = $progression . '..';
            $correctAnswer = (string) $progressionMember;
        } else {
            $progression = $progression . (string) $progressionMember;
        }
        if ($index < $progressionLehgth) {
            $progression = $progression . ' ';
        }
        $progressionMember = $progressionMember + $progressionStep;
    }
    $result = [$progression, $correctAnswer];
    return $result;
}
*/

function progression()
{
    $gameDescription = 'What number is missing in the progression?';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
        $progressionMember = rand(1, 100);
        $progressionStep = rand(-5, 5);
        $progressionLehgth = 10;
        $unknownMemberNumber = rand(1, $progressionLehgth);
        $index = 1;
        $progression = '';
        for ($index; $index <= $progressionLehgth; $index++) {
            if ($index === $unknownMemberNumber) {
                $progression = $progression . '..';
                $missingMember = (string) $progressionMember;
            } else {
                $progression = $progression . (string) $progressionMember;
            }
            if ($index < $progressionLehgth) {
                $progression = $progression . ' ';
            }
            $progressionMember = $progressionMember + $progressionStep;
        }
        if (isUserAnswerTrue($playerName, $progression, $missingMember)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
