<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

define('ROUND_COUNT', 3);

function play($solution, $rules)
{
    line('Welcome to Brain Games!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        [$question, $answer] = call_user_func($solution);
        line("Question: %s", $question);
        $userMessage = prompt('Your answer');
        if ($userMessage == $answer) {
            line('Correct!');
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $userMessage,
                $answer
            );
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
