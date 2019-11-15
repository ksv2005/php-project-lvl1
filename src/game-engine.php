<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

define('COUNT_GAMES', 3);

function success()
{
    line('Correct!');
    return true;
}

function error($name, $correct, $userMessage)
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'.",
        $userMessage,
        $correct
    );
    line("Let's try again, %s!", $name);
    return false;
}

function process($name, $solution)
{
    [$question, $answer] = call_user_func($solution);
    line("Question: %s", $question);
    $userMessage = prompt('Your answer');
    return ($userMessage == $answer) ?
        success() : error($name, $answer, $userMessage);
}

function game($solution, $conditionMessage)
{
    line('Welcome to Brain Games!');
    line($conditionMessage);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $count = 0;
    while ($count < COUNT_GAMES) {
        if (!process($name, $solution)) {
            return;
        }
        $count++;
    }
    line("Congratulations, %s!", $name);
}
