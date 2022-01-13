#!/usr/bin/env php
<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\main;

const RULE_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): string
{
    for ($i = 2; $i < $number - 1; $i++) {
        if ($number % $i === 0) {
            return "no";
        }
    }
    return "yes";
}
function run()
{
    main(
        function () {
            $number = rand(0, 100);
            $question = $number;
            $correctAnswer = isPrime($number);
            return [$question, $correctAnswer];
        },
        RULE_PRIME
    );
}
