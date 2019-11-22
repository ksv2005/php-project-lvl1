<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\play;

define('RULE_GCD', 'Find the greatest common divisor of given numbers.');

function run()
{
    play(
        function () {
            $number1 = rand(1, 99);
            $number2 = rand(1, 99);
            $question = "{$number1} $number2";
            $answer = gcd($number1, $number2);
            return [$question, $answer];
        },
        RULE_GCD
    );
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
