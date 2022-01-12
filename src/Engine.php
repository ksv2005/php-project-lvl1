<?php

// phpcs:disable
require_once __DIR__ . '/../vendor/autoload.php';
use function cli\line;
use function cli\prompt;
// phpcs:enable

function main($game)
{
    $gameComment = match ($game) {
        "even" => "Answer 'yes' if the number is even, otherwise answer 'no'.",
        "calc" => "What is the result of the expression?",
        "gcd" => "Find the greatest common divisor of given numbers.",
        "progression" => "What number is missing in the progression?",
        "prime" => 'Answer "yes" if given number is prime. Otherwise answer "no".',
    };
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($gameComment);
    $roundCount = 0;
    while ($roundCount < 3) {
        $question = null;
        $correctAnswer = null;
        switch ($game) {
            case "even":
                [$question, $correctAnswer] = evenGame();
                break;
            case "calc":
                [$question, $correctAnswer] = calcGame();
                break;
            case "gcd":
                [$question, $correctAnswer] = gcdGame();
                break;
            case "progression":
                [$question, $correctAnswer] = progressionGame();
                break;
            case "prime":
                [$question, $correctAnswer] = primeGame();
                break;
        }
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
