<?php

namespace BrainGames\Gcd;

use function BrainGames\Common\game;

function run()
{
    game('gcd', condition_message());
}

function solution()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $question = "{$number1} $number2";
    $answer = gcd($number1, $number2);
    return [$question, $answer];
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function condition_message()
{
    return 'Find the greatest common divisor of given numbers.';
}
