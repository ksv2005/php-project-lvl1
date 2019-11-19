<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\game;

function run()
{
    game(
        'BrainGames\Games\Gcd\getQuestionAndAnswer',
        'Find the greatest common divisor of given numbers.'
    );
}

function getQuestionAndAnswer()
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
