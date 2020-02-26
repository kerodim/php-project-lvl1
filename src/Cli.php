<?php
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
  line('Welcometo the Brain Games!');
  $name = prompt('May I have your name?');
  line("Hello, %s!", $name);
}
