<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Logic\isEven;

function run()
{
    line('Welcometo the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $index = 3;
    for ($index; $index >= 1;) {
        $number = rand(1, 100);
        line('Question: ' . $number);
        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($number);
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $index = $index - 1;
        } else {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, " . $name . '!');
        }
    }
    line('Congratulations, ' . $name . '!');
}
