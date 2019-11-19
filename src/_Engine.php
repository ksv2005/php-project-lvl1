<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

define('COUNT_GAMES', 3);

function game($solution, $conditionMessage)
{
    line('Welcome to Brain Games!');
    line($conditionMessage);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    for ($i = 0; $i < COUNT_GAMES; $i++) {
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
