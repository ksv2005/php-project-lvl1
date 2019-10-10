<?php

namespace BrainGames\Prime;

use function BrainGames\Common\game;

function run()
{
    game('prime', condition_message());
}

function condition_message()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function solution()
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
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $max_factor = (int) sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
