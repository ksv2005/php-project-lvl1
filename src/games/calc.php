<?php

namespace BrainGames\Calc;

use function BrainGames\Common\game;

function run()
{
    game('calc', condition_message());
}

function solution()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $expression_array = ['+', '-', '*'];
    $expression = $expression_array[array_rand($expression_array)];
    $question = "{$number1} {$expression} $number2";
    $answer = decision($expression, $number1, $number2);

    return [$question, $answer];
}

function decision($expression, $number1, $number2)
{
    switch ($expression) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function condition_message()
{
    return 'What is the result of the expression?';
}
