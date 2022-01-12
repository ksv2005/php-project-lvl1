<?php

// phpcs:disable
require_once __DIR__ . '/../vendor/autoload.php';
use function cli\line;
use function cli\prompt;
// phpcs:enable

function main($game, $rule)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($rule);
    $roundCount = 0;
    while ($roundCount < 3) {
        [$question, $correctAnswer] = call_user_func($game);
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== $correctAnswer) {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
        $roundCount++;
    }
    line("Congratulations, {$name}!");
}
