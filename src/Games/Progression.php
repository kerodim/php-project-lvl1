<?php

namespace Braingames\Games\Progression;

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
