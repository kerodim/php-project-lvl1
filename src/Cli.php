<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\Even\isEven;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $raunds = 3;
    for ($raunds; $raunds >= 1;) {
        $number = rand(1, 100);
        line('Question: ' . $number);
        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($number);
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $raunds = $raunds - 1;
        } else {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, " . $name . '!');
        }
    }
    line('Congratulations, ' . $name . '!');
}
