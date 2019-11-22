<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\play;

define('OPERATIONS', ['+', '-', '*']);
define('RULE_CALC', 'What is the result of the expression?');

function run()
{
    play(
        function () {
            $number1 = rand(1, 99);
            $number2 = rand(1, 99);
            $operation = OPERATIONS[array_rand(OPERATIONS)];
            $question = "$number1 $operation $number2";
            $answer = getResult($operation, $number1, $number2);
            return [$question, $answer];
        },
        RULE_CALC
    );
}

function getResult($operation, $number1, $number2)
{
    switch ($operation) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}
