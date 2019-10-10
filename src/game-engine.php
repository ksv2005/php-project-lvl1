<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

define('COUNT_GAMES', 3);

function greetings()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}

function welcome()
{
    line('Welcome to Brain Games!');
}

function condition($conditionMessage)
{
    line($conditionMessage);
    line('');
}

function congratulation($name)
{
    line("Congratulations, %s!", $name);
}

function correctMessage()
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

function userMessage()
{
    return prompt('Your answer');
}

function questionMessage($text)
{
    line("Question: %s", $text);
}

function game($type, $conditionMessage)
{
    welcome();
    condition($conditionMessage);
    $name = greetings();
    $count = 0;
    while ($count < COUNT_GAMES) {
        if (!process($name, $type)) {
            return;
        }
        $count++;
    }
    congratulation($name);
}

function process($name, $type)
{
    [$question, $answer] = chooseSolution($type);
    questionMessage($question);
    $userMessage = userMessage();
    return ($userMessage == $answer) ?
        correctMessage() : error($name, $answer, $userMessage);
}

function chooseSolution($type)
{
    switch ($type) {
        case 'even':
            return \BrainGames\Games\Even\solution();
        case 'calc':
            return \BrainGames\Games\Calc\solution();
        case 'gcd':
            return \BrainGames\Games\Gcd\solution();
        case 'progression':
            return \BrainGames\Games\Progression\solution();
        case 'prime':
            return \BrainGames\Games\Prime\solution();
    }
}
