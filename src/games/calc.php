<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\game;

define('OPERATION_TYPE', ['+', '-', '*']);

function run()
{
    game(
        'BrainGames\Games\Calc\getQuestionAndAnswer',
        'What is the result of the expression?'
    );
}

function getQuestionAndAnswer()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $operation = OPERATION_TYPE[array_rand(OPERATION_TYPE)];
    $question = "{$number1} {$operation} $number2";
    $answer = getResult($operation, $number1, $number2);
    return [$question, $answer];
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
