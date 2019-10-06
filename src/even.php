<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

define('COUNT_GAMES', 3);

function run()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    $count = 0;
    while ($count < COUNT_GAMES) {
        if (game($name)) {
            $count++;
        } else {
            return;
        }
    }
    line("Congratulations, %s!", $name);
}

function game($name)
{
    $number = rand(1, 99);
    line("Question: %s", $number);
    $answer = prompt('Your answer');
    $true_answer = ($number % 2 == 0) ? 'yes' : 'no';
    if ($answer == $true_answer) {
        line('Correct!');
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $true_answer);
        line("Let's try again, %s!", $name);
        return false;
    }
}
