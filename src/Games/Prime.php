<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\play;

define(
    'RULE_PRIME',
    'Answer "yes" if given number is prime. Otherwise answer "no".'
);

function run()
{
    play(
        function () {
            $question = rand(1, 100);
            $answer = isPrime($question) ? 'yes' : 'no';
            return [$question, $answer];
        }, RULE_PRIME
    );
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
