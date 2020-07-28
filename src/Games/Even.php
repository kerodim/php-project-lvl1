<?php

namespace BrainGames\Games\Even;

# use function BrainGames\Cli\gameGreeting;
# use function BrainGames\Cli\isUserAnswerTrue;
# use function BrainGames\Cli\gameEnding;
use function BrainGames\Cli\engine;

/*
function showTaskToPlayerEven()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
function generationRandomNumber()
{
    return rand(1, 100);
}
function isEven($number)
{
    if ($number % 2 === 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
    return $correctAnswer;
}
*/

/*
function even_old()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $playerName = gameGreeting($gameDescription);
    for ($round = 1; $round <= 3;) {
        $number = rand(1, 100);
        if ($number % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        if (isUserAnswerTrue($playerName, $number, $correctAnswer)) {
            $round += 1;
        } else {
            $round = 1;
        }
    }
    gameEnding($playerName);
}
*/

function even()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    $maxCorrectAnswerNumber = 3;
    $separator = ': ';
    /*
    for ($round = 0; $round < $maxCorrectAnswerNumber; $round++) {
        $roundData = [];
        $number = rand(1, 100);
        $questionIndex = 0;
        $answerIndex = 1;
        $roundData[$questionIndex] = $number;
        if ($number % 2 === 0) {
            $roundData[$answerIndex] = 'yes';
        } else {
            $roundData[$answerIndex] = 'no';
        }
        $gameData[$round] = $roundData;
    }
    */
    for ($index = 0; $index < $maxCorrectAnswerNumber; $index++) {
        $number = rand(1, 100);
        $number % 2 === 0 ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $gameData[$index] = (string) $number . $separator . $correctAnswer;
    }
    engine($gameDescription, $gameData, $maxCorrectAnswerNumber, $separator);
}
