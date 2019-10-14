<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

define('COUNT_GAMES', 3);

function game($type, $conditionMessage)
{
    line('Welcome to Brain Games!');
    line($conditionMessage);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    $count = 0;
    while ($count < COUNT_GAMES) {
        if (!process($name, $type)) {
            return;
        }
        $count++;
    }
    line("Congratulations, %s!", $name);
}

function process($name, $type)
{
    [$question, $answer] = chooseSolution($type);
    line("Question: %s", $question);
    $userMessage = prompt('Your answer');
    if ($userMessage == $answer) {
        line('Correct!');
        return true;
    } else {
        line(
            "'%s' is wrong answer ;(. Correct answer was '%s'.",
            $userMessage,
            $answer
        );
        line("Let's try again, %s!", $name);
        return false;
    }
}

function chooseSolution($type)
{
    switch ($type) {
        case 'even':
            return \BrainGames\Games\Even\getResult();
        case 'calc':
            return \BrainGames\Games\Calc\getResult();
        case 'gcd':
            return \BrainGames\Games\Gcd\getResult();
        case 'progression':
            return \BrainGames\Games\Progression\getResult();
        case 'prime':
            return \BrainGames\Games\Prime\getResult();
    }
}
