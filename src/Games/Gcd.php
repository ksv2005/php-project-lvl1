#!/usr/bin/env php
<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\main;

const RULE_GCD = "Find the greatest common divisor of given numbers.";

function calculateGcd(int $firstNumber, int $secondNumber): int
{
    while ($secondNumber != 0) {
        $temp = $firstNumber % $secondNumber;
        $firstNumber = $secondNumber;
        $secondNumber = $temp;
    }
    return $firstNumber;
}
function run()
{
    main(
        function () {
            $firstNumber = rand(0, 100);
            $secondNumber = rand(0, 100);
            $question = "{$firstNumber} {$secondNumber}";
            $correctAnswer = (string)calculateGcd($firstNumber, $secondNumber);
            return [$question, $correctAnswer];
        },
        RULE_GCD
    );
}
