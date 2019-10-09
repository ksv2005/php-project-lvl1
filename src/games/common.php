<?php

namespace BrainGames\Common;

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

function condition($condition_message)
{
    line($condition_message);
    line('');
}

function congratulation($name)
{
    line("Congratulations, %s!", $name);
}

function correct_message()
{
    line('Correct!');
    return true;
}

function error($name, $correct, $user_message)
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'.",
        $user_message,
        $correct
    );
    line("Let's try again, %s!", $name);
    return false;
}

function user_message()
{
    return prompt('Your answer');
}

function question_message($text)
{
    line("Question: %s", $text);
}

function game($type, $condition_message)
{
    welcome();
    condition($condition_message);
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
    [$question, $answer] = choose_solution($type);
    question_message($question);
    $user_message = user_message();
    return ($user_message == $answer) ?
        correct_message() : error($name, $answer, $user_message);
}

function choose_solution($type)
{
    switch ($type) {
        case 'even':
            return \BrainGames\Even\solution();
        case 'calc':
            return \BrainGames\Calc\solution();
        case 'gcd':
            return \BrainGames\Gcd\solution();
    }
}
