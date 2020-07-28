<?php

namespace Braingames\Games\Progression;

#use function BrainGames\Cli\gameGreeting;
#use function BrainGames\Cli\isUserAnswerTrue;
#use function BrainGames\Cli\gameEnding;
use function BrainGames\Cli\engine;

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
/*
function progression_old()
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
*/

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
