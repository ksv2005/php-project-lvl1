<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\GameEngine\game;

function run()
{
    game('gcd', conditionMessage());
}

function getResult()
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

function conditionMessage()
{
    return 'Find the greatest common divisor of given numbers.';
}
