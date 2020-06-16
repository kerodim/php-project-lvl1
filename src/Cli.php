<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;
use function BrainGames\Games\Even\isEven;
use function BrainGames\Games\Even\randomNumber;

# function run_old()
# {
#     line('Welcome to the Brain Games!');
#     line('Answer "yes" if the number is even, otherwise answer "no".');
#     line('');
#     $name = prompt('May I have your name?');
#     line("Hello, %s!", $name);
#     line('');
#     $raunds = 3;
#     for ($raunds; $raunds >= 1;) {
#         $number = rand(1, 100);
#         line('Question: ' . $number);
#         $userAnswer = prompt('Your answer');
#         $correctAnswer = isEven($number);
#         if ($userAnswer == $correctAnswer) {
#             line('Correct!');
#             $raunds = $raunds - 1;
#         } else {
#             line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
#             line("Let's try again, " . $name . '!');
#         }
#     }
#     line('Congratulations, ' . $name . '!');
# }



function run($game)
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $raunds = 3;
    for ($raunds; $raunds >= 1;) {
        # if game = even
        #     question = randomNumber()
        #     correctAnswer = isEven($question)
        # elseif game = calc
        #     question = some_question
        #     correctAnswer = calc_function($question)
        # или

        # print_r($game . PHP_EOL);
        switch ($game) {
            case 'even':
                $question = randomNumber();
                $correctAnswer = isEven($question);
                break;
            case 'calc':
                $question = some_question();
                $correctAnswer = calc_function($question);
                break;
            default:
                #throw new \Error("Unknown state!");
                #throw new \Error("Unknown game: {$game}!");
                throw new \Error("Unknown game: '{$game}'!");
        }
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $raunds = $raunds - 1;
        } else {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, " . $name . '!');
        }
    }
}
