<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\game;

function run()
{
    game('BrainGames\Games\Calc\getSolution', conditionMessage());
}

function getSolution()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $operatonType = ['+', '-', '*'];
    $operation = $operatonType[array_rand($operatonType)];
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

function conditionMessage()
{
    return 'What is the result of the expression?';
}
