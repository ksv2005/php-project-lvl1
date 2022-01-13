<?php

// phpcs:disable
namespace BrainGames\Engine;

const MAX_ROUND_COUNT = 3;
use function cli\line;
use function cli\prompt;
// phpcs:enable

function main(callable $game, string $rule)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($rule);
    $currentRoundCount = 0;
    while ($currentRoundCount < MAX_ROUND_COUNT) {
        [$question, $correctAnswer] = call_user_func($game);
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== $correctAnswer) {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
        $currentRoundCount++;
    }
    line("Congratulations, {$name}!");
}
