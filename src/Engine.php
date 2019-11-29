<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

define('ROUNDS_COUNT', 3);

function play($getQuestionAnswer, $rule)
{
    line('Welcome to Brain Games!');
    line($rule);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = call_user_func($getQuestionAnswer);
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
