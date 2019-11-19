<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\game;

function run()
{
    game(
        'BrainGames\Games\Prime\getQuestionAndAnswer',
        'Answer "yes" if given number is prime. Otherwise answer "no".'
    );
}

function getQuestionAndAnswer()
{
    $number = rand(1, 100);
    $answer = isPrime($number) ? 'yes' : 'no';
    $question = $number;
    return [$question, $answer];
}

function isPrime($number)
{
    if ($number == 2) {
        return true;
    }
    if ($number < 2 || $number % 2 == 0) {
        return false;
    }
    $i = 3;
    while ($i <= (int) sqrt($number)) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
