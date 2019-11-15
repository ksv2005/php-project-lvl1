<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\GameEngine\game;

function run()
{
    game('BrainGames\Games\Gcd\getSolution', conditionMessage());
}

function getSolution()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $question = "{$number1} $number2";
    $answer = getResult($number1, $number2);
    return [$question, $answer];
}

function getResult($a, $b)
{
    return ($a % $b) ? getResult($b, $a % $b) : $b;
}

function conditionMessage()
{
    return 'Find the greatest common divisor of given numbers.';
}
