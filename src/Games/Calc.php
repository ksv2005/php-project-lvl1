#!/usr/bin/env php
<?php

namespace BrainGames\Games\Calc;

const RULE_CALC = "What is the result of the expression?";

function calculateExpression(string $expression): int
{
    [$firstNumber, $operation, $secondNumber] = explode(" ", $expression);
    if ($operation === "+") {
        return (int)$firstNumber + (int)$secondNumber;
    } elseif ($operation === "-") {
        return (int)$firstNumber - (int)$secondNumber;
    } elseif ($operation === "*") {
        return (int)$firstNumber * (int)$secondNumber;
    }
    return 0;
}

function run()
{
    main(
        function () {
            $firstNumber = rand(0, 100);
            $operation = ["+", "-", "*"][rand(0, 2)];
            $secondNumber = rand(0, 100);
            $question = "{$firstNumber} {$operation} {$secondNumber}";
            $correctAnswer = (string)calculateExpression($question);
            return [$question, $correctAnswer];
        },
        RULE_CALC
    );
}
